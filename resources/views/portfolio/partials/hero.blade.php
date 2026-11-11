<section id="home" class="hero">
    <div>
        <div class="me">
            <button class="ava" id="ava" type="button" aria-label="Foto profil">
                <img id="pic" alt="Foto {{ $profile->name }}" style="display: {{ $profile->photo_path ? 'block' : 'none' }}" src="{{ $profile->photo_path ? asset('storage/' . $profile->photo_path) : '' }}">
                @php $initials = collect(explode(' ', $profile->name))->map(fn($n) => substr($n, 0, 1))->take(2)->join(''); @endphp
                <span id="ini" style="display: {{ $profile->photo_path ? 'none' : 'grid' }}">{{ strtoupper($initials) }}</span>
            </button>
            
            @if($admin_mode)
                <button class="btn up" id="upb" type="button">Ganti foto</button>
                <form id="photo-form" action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                    @csrf 
                    <input type="file" id="file" name="photo" accept="image/*">
                </form>
            @endif
        </div>
        <div class="role" id="role"></div>
        <h1>Halo, saya {{ explode(' ', $profile->name)[0] }}.</h1>
        <p class="lead">{{ $profile->bio }}</p>
        <div class="btns">
            <a class="btn p" href="#projects">Lihat proyek saya</a>
            <a class="btn" href="#contact">Hubungi saya</a>
            
            <!-- Tombol Download CV Publik -->
            @if($profile->cv_path)
                <a class="btn" href="{{ route('profile.download-cv') }}" style="border-color: var(--ac2); color: var(--ac2);">Download CV</a>
            @endif

            <!-- Tombol Upload CV Admin -->
            @if($admin_mode)
                <button class="btn" id="upcv-btn" type="button" style="border-style: dashed; opacity: 0.8;">Upload CV (PDF)</button>
                <form id="cv-form" action="{{ route('profile.update-cv') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                    @csrf 
                    <input type="file" id="cv-file" name="cv_file" accept="application/pdf">
                </form>
            @endif
        </div>
        <div class="soc" id="soc1">
            @foreach($socialLinks as $soc)
                <a href="{{ $soc->url }}" target="_blank" rel="noopener"><svg class="i"><use href="#{{ $soc->platform_key }}"/></svg></a>
            @endforeach
        </div>
    </div>
    <div class="term" aria-label="Terminal interaktif">
        <div class="tb"><i></i><i></i><i></i><span>terminal – coba ketik perintah</span></div>
        <div id="out" aria-live="polite"></div><div class="chips" id="chips"></div>
        <label class="ln"><span>$</span><input id="cmd" autocomplete="off" spellcheck="false" placeholder="ketik help lalu Enter"></label>
    </div>
</section>