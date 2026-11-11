<section id="contact">
    <div class="rv">
        <h2>Mari terhubung</h2>
        <p class="sub">Ikuti dan hubungi saya lewat media sosial berikut, atau kirim pesan langsung.</p>
        <div class="ct">
            <div class="links" id="soc2">
                @foreach($socialLinks as $soc)
                    <a href="{{ $soc->url }}" target="_blank" rel="noopener">
                        <svg class="i"><use href="#{{ $soc->platform_key }}"/></svg>
                        <span>{{ $soc->platform_name }}<small>{{ $soc->handle }}</small></span>
                    </a>
                @endforeach
            </div>
            
            <form id="f" method="POST" action="{{ route('portfolio.send') }}">
                @csrf
                <div>
                    <input id="fn" type="text" name="name" placeholder="Nama kamu" value="{{ old('name') }}" required>
                    @error('name') 
                        <small style="color: #ff5f57; display: block; margin-top: 5px;">{{ $message }}</small> 
                    @enderror
                </div>
                <div>
                    <input id="fe" type="email" name="email" placeholder="Email kamu" value="{{ old('email') }}" required>
                    @error('email') 
                        <small style="color: #ff5f57; display: block; margin-top: 5px;">{{ $message }}</small> 
                    @enderror
                </div>
                <div>
                    <textarea id="fm" name="message" rows="5" placeholder="Tulis pesan" required>{{ old('message') }}</textarea>
                    @error('message') 
                        <small style="color: #ff5f57; display: block; margin-top: 5px;">{{ $message }}</small> 
                    @enderror
                </div>
                <button class="btn p" type="submit">Kirim pesan</button>
            </form>
        </div>
    </div>
</section>