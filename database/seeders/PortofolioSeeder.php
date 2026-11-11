<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\SocialLink;

class PortofolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Profil Deffa
        Profile::create([
            'name' => 'Deffa Haidar Darmansyah',
            'role_titles' => ['Mahasiswa Teknik Informatika', 'Web Developer', 'Tech Enthusiast', 'UI/UX Designer', 'AI & Data Enthusiast', 'IoT Hobbyist'],
            'bio' => 'Mahasiswa Teknik Informatika semester 5 yang suka membangun aplikasi web, mengeksplorasi teknologi baru dan Fokus pada UI/UX Design.',
            'about' => 'Saya mulai ngoding dan terbiasa menggunakan Visual Studio Code & Figma. Saat ini sering mengerjakan proyek web menggunakan Laravel, aplikasi mobile dengan React Native (Expo), hingga eksperimen Computer Vision di Google Colab. Target saya terus mengasah skill software engineering.',
            'semester' => 5,
            'total_projects' => 4,
            'gpa' => 3.6,
            'tech_count' => 8,
        ]);

        // 2. Data Skill
        $skills = [
            ['name' => 'Laravel & PHP', 'percentage' => 70],
            ['name' => 'React Native & Expo', 'percentage' => 75],
            ['name' => 'Python (OpenCV)', 'percentage' => 75],
            ['name' => 'JavaScript & Figma', 'percentage' => 80],
            ['name' => 'Git & GitHub', 'percentage' => 85],
            ['name' => 'SQL (MySQL)', 'percentage' => 60],
            ['name' => 'HTML & CSS', 'percentage' => 70],
            ['name' => 'Arduino & Tinkercad', 'percentage' => 70],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // 3. Data Proyek
        $projects = [
            [
                'title' => 'Web Pengembalian Buku & Denda',
                'category' => 'Web',
                'description' => 'Aplikasi web dengan kalkulasi denda otomatis, fitur scan barcode, penyesuaian manual, dan diskon untuk tingkatan member.',
                'tags' => ['Laravel', 'PHP', 'MySQL']
            ],
            [
                'title' => 'Diary App Mobile',
                'category' => 'Mobile',
                'description' => 'Aplikasi mobile catatan harian (diary-app2) dengan fitur pencarian, filter mood, dan tab navigation.',
                'tags' => ['React Native', 'Expo', 'React Context']
            ],
            [
                'title' => 'Eksperimen Computer Vision',
                'category' => 'AI & Data',
                'description' => 'Praktikum pemrosesan citra digital melibatkan manipulasi histogram, cropping, dan rotasi gambar.',
                'tags' => ['Python', 'OpenCV', 'Google Colab']
            ],
            [
                'title' => 'Simulasi Traffic Light & Buzzer',
                'category' => 'IoT',
                'description' => 'Sirkuit simulasi Arduino untuk lampu lalu lintas 4 simpang dan sirkuit musical buzzer yang disinkronisasi.',
                'tags' => ['Arduino', 'C++', 'Tinkercad']
            ],
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }

        // 4. Data Link Sosial Media
        $socials = [
            ['platform_name' => 'GitHub', 'platform_key' => 'gh', 'url' => 'https://github.com/deffaa', 'handle' => '@deffaa'],
            ['platform_name' => 'Instagram', 'platform_key' => 'ig', 'url' => 'https://instagram.com/devahaidarr', 'handle' => '@devahaidarr'],
            ['platform_name' => 'TikTok', 'platform_key' => 'tt', 'url' => 'https://tiktok.com/@devahaidarr', 'handle' => '@devahaidarr'],
            ['platform_name' => 'LinkedIn', 'platform_key' => 'li', 'url' => 'https://www.linkedin.com/in/deffa-haidar-86b7aa440 ', 'handle' => 'in/deffa haidar'],
            ['platform_name' => 'Email', 'platform_key' => 'email', 'url' => 'https://mail.google.com/mail/?view=cm&fs=1&to=haidarsdeffa@email.com&su=Halo%20Deffa&body=Halo%20Deffa,%20saya%20melihat%20portofolio%20kamu%20dan%20ingin%20terhubung.', 'handle' => 'haidarsdeffa@email.com'],       ];
        foreach ($socials as $social) {
            SocialLink::create($social);
        }
    }
}