<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="color-scheme" content="dark">
    <title>Portofolio – {{ $profile->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;600;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <svg width="0" height="0" style="position:absolute" aria-hidden="true">
        <symbol id="gh" viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></symbol>
        <symbol id="ig" viewBox="0 0 24 24"><path d="M7.75 2h8.5c3.17 0 5.75 2.58 5.75 5.75v8.5c0 3.17-2.58 5.75-5.75 5.75h-8.5c-3.17 0-5.75-2.58-5.75-5.75v-8.5c0-3.17 2.58-5.75 5.75-5.75zm0 1.5c-2.35 0-4.25 1.9-4.25 4.25v8.5c0 2.35 1.9 4.25 4.25 4.25h8.5c2.35 0 4.25-1.9 4.25-4.25v-8.5c0-2.35-1.9-4.25-4.25-4.25h-8.5zm4.25 4a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9zm0 1.5a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm4.75-3.5a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5z"/></symbol>
        <symbol id="tt" viewBox="0 0 24 24"><path d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v7.2c0 1.96-.5 3.96-1.74 5.46-1.57 1.9-4.04 2.89-6.47 2.4-2.4-.48-4.4-2.18-5.3-4.42-1.04-2.58-.61-5.69 1.17-7.85 1.7-2.07 4.54-3.08 7.07-2.45v4.2c-1.34-.4-2.88-.08-3.9 1.02-1.05 1.1-1.3 2.72-.6 4.02.7 1.25 2.12 1.98 3.55 1.9 1.57-.1 2.92-1.24 3.32-2.76.12-.45.14-.92.14-1.39v-15.4z"/></symbol>
        <symbol id="li" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2zM4 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/></symbol>
        <symbol id="email" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-8V6l8 5 8-8v2z"/></symbol>
    </svg>

    <div class="glow" id="glow"></div><div id="bar"></div>
    
    <header>
        <nav>
            <a class="logo" href="#home">&lt;<b>{{ strtolower(explode(' ', $profile->name)[0]) }}</b>.dev /&gt;</a>
            <ul id="menu">
                <li><a href="#home">Beranda</a></li><li><a href="#about">Tentang</a></li>
                <li><a href="#skills">Skill</a></li><li><a href="#projects">Proyek</a></li><li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>@yield('content')</main>

    <footer>Dibuat dengan Laravel, HTML, CSS, dan JS oleh {{ $profile->name }} © {{ date('Y') }}</footer>
    
    <div id="lb" role="dialog" aria-label="Foto profil diperbesar"><img id="lbimg" alt="Foto {{ $profile->name }} diperbesar"></div>
    <div id="toast" role="status"></div>

<!-- Karakter Piksel Interaktif (Sprite Sheet Berganti Pose saat Diklik) -->
    <div id="interactive-char" aria-label="Karakter Deffa">
        <div id="speech-bubble">Halo! Selamat datang di web saya.</div>
        <div class="pixel-sprite" id="pixelChar"></div>
    </div>

    <script>
        window.portfolioData = {
            roles: @json($profile->role_titles), skills: @json($skills), projects: @json($projects), socials: @json($socialLinks)
        };
        window.flashMessage = @json(session('success') ?? '');
        window.errorMessage = @json(session('error') ?? '');
    </script>
</body>
</html>