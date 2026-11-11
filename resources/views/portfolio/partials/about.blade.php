<section id="about">
    <div class="rv">
        <h2>Tentang saya</h2>
        <p class="sub">Saya kuliah di Universitas Muhammadiyah Kota Sukabumi Program Studi Teknik Informatika dan sedang fokus ke pengembangan web serta dasar kecerdasan buatan.</p>
        <div class="about">
            <p>{{ $profile->about }}</p>
            <!-- Bagian Riwayat Pendidikan -->
<div class="edu-box">
    <h3>Riwayat Pendidikan</h3>
    <div class="timeline">
        <!-- Pendidikan Saat Ini -->
        <div class="tl-item">
            <div class="tl-dot"></div>
            <h4>Teknik Informatika (S1)</h4>
            <p>Universitas Muhammadiyah Sukabumi</p>
            <span>Saat ini - Mahasiswa Aktif</span>
        </div>
        <!-- Pendidikan Sebelumnya -->
        <div class="tl-item">
            <div class="tl-dot"></div>
            <h4>Jurusan IPA</h4>
            <p>SMA Negeri 4 Sukabumi</p>
            <span>Lulus</span>
        </div>
    </div>
</div>
            <div class="stats">
                <div class="stat"><b data-n="{{ $profile->semester }}">0</b><span>Semester ditempuh</span></div>
                <div class="stat"><b data-n="{{ $profile->total_projects }}">0</b><span>Proyek dibuat</span></div>
                <div class="stat"><b data-n="{{ $profile->gpa }}" data-d="2">0</b><span>IPK terakhir</span></div>
                <div class="stat"><b data-n="{{ $profile->tech_count }}">0</b><span>Teknologi dikuasai</span></div>
            </div>
        </div>
    </div>
</section>