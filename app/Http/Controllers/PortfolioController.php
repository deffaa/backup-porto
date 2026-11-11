<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\SocialLink;
use App\Models\Message;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();
        $skills = Skill::all();
        $projects = Project::all();
        $socialLinks = SocialLink::all();
        $categories = Project::select('category')->distinct()->pluck('category');
        $admin_mode = env('ADMIN_MODE', false);

        return view('portfolio.index', compact('profile', 'skills', 'projects', 'socialLinks', 'categories', 'admin_mode'));
    }

    public function sendMessage(ContactRequest $request): RedirectResponse
    {
        Message::create($request->validated());
        return back()->with('success', 'Pesan kamu berhasil terkirim!');
    }

    public function updatePhoto(Request $request): RedirectResponse
    {
        if (!env('ADMIN_MODE', false)) {
            return back()->with('error', 'Akses ditolak! Mode Admin tidak aktif.');
        }

        $request->validate(['photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048']);
        $profile = Profile::first();

        if ($profile->photo_path && Storage::disk('public')->exists($profile->photo_path)) {
            Storage::disk('public')->delete($profile->photo_path);
        }

        $path = $request->file('photo')->store('profiles', 'public');
        $profile->update(['photo_path' => $path]);

        return back()->with('success', 'Foto profil berhasil diperbarui secara permanen!');
    }

    // --- FITUR DOWNLOAD CV ---
    public function downloadCv()
    {
        $profile = Profile::first();
        
        if (!$profile || !$profile->cv_path || !Storage::disk('public')->exists($profile->cv_path)) {
            return back()->with('error', 'Maaf, file CV belum tersedia saat ini.');
        }

        return Storage::disk('public')->download($profile->cv_path, 'CV_Deffa_Haidar.pdf');
    }

    // --- FITUR UPLOAD CV (ADMIN ONLY) ---
    public function updateCv(Request $request): RedirectResponse
    {
        if (!env('ADMIN_MODE', false)) {
            return back()->with('error', 'Akses ditolak! Mode Admin tidak aktif.');
        }

        $request->validate(['cv_file' => 'required|mimes:pdf|max:5120']);
        $profile = Profile::first();

        if ($profile->cv_path && Storage::disk('public')->exists($profile->cv_path)) {
            Storage::disk('public')->delete($profile->cv_path);
        }

        $path = $request->file('cv_file')->store('cv', 'public');
        $profile->update(['cv_path' => $path]);

        return back()->with('success', 'File CV (PDF) berhasil diunggah!');
    }
}