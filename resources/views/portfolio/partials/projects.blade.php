<section id="projects">
    <div class="rv">
        <h2>Proyek</h2>
        <p class="sub">Pilih kategori untuk menyaring proyek. Gerakkan kursor di atas kartu untuk efek miring.</p>
        <div class="flt" id="flt">
            <button class="on">Semua</button>
            @foreach($categories as $category)
                <button>{{ $category }}</button>
            @endforeach
        </div>
        <div class="grid" id="grid">
            @foreach($projects as $project)
                <article class="card" data-c="{{ $project->category }}">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                    <div class="tg">
                        @foreach($project->tags as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>