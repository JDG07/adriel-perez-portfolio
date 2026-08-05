<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

Route::get('/project-modal/{project:slug}', function (Project $project) {

    $project->load([
        'categories',
        'images',
    ]);

    return view('partials.project-content', compact('project'));

})->name('project.modal');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/projects', 'projects')->name('projects');

Route::view('/contact', 'contact')->name('contact');

Route::get('/php-upload', function () {
    return [
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size' => ini_get('post_max_size'),
        'max_file_uploads' => ini_get('max_file_uploads'),
        'memory_limit' => ini_get('memory_limit'),
    ];
});