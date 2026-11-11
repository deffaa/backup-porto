<section id="skills">
    <div class="rv">
        <h2>Skill</h2>
        <p class="sub">Tingkat kemampuan berdasarkan pengalaman proyek dan tugas kuliah.</p>
        <div class="skills" id="skl">
            @foreach($skills as $skill)
                <div class="sk">
                    <div><span>{{ $skill->name }}</span><em>{{ $skill->percentage }}%</em></div>
                    <div class="trk"><i data-w="{{ $skill->percentage }}"></i></div>
                </div>
            @endforeach
        </div>
    </div>
</section>