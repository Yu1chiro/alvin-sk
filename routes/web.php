<?php

use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Article;
use App\Models\Tool;

Route::get('/', function () {
    $setting = Setting::first();
    $projects = Project::latest()->get();
    
    // Ambil 3 artikel terbaru untuk ditampilkan di Home
    $articles = Article::latest()->take(3)->get(); 
    $tools = Tool::all();
    // Kirim variable $articles ke view
    return view('welcome', compact('setting', 'projects', 'articles', 'tools'));
});
// Route Darurat untuk Migrate Database di Vercel
Route::get('/run-migration', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate --force');
    return 'Migration Berhasil! Silakan hapus route ini kembali.';
});
Route::get('/project/{slug}', function ($slug) {
    $project = Project::where('slug', $slug)->firstOrFail();
    $setting = Setting::first();
    
    // Pastikan nama file view sesuai dengan yang ada di folder resources/views/
    return view('detail-portfolio', compact('project', 'setting')); 
})->name('project.detail');
Route::get('/blog/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->firstOrFail();
    $setting = App\Models\Setting::first();
    
    return view('read-article', compact('article', 'setting'));
})->name('blog.read');