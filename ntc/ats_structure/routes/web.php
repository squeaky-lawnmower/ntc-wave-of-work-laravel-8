<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use App\Models\Jobs;
use App\Http\Controllers\MailController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registration.post');
Route::post('/sendMail', [MailController::class, 'sendMail'])->name('sendMail');
Route::get('/support', function () {
    return view('support');
});

    //password related routes
Route::prefix('password')->group(function() {
    Route::get('/forgot', [AuthController::class, 'forgotpass'])->name('forgotpass');
    Route::get('/reset/{id}', [AuthController::class, 'resetpass'])->name('resetpass');
    Route::post('/reset/{id}', [AuthController::class, 'resetpassPost'])->name('password.reset.post');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/messages', function () {
        return view('messages');
    })->name("messages");
    
    Route::get('/dashboard', function () {
        
        $id = auth()->user()->id;
        $jobs = Jobs::where('creator_id', $id)->orderByDesc('created_at')->get();

        $data = [
            'id' => $id,
            'jobs' => $jobs
        ];

        return view('dashboard')->with('data', $data);
    })->name('home');

    //profile related routes
    Route::prefix('profile')->group(function() {
        //index
        Route::get('/{id}', [ProfileController::class, 'show'])->name('profile');
        
        //personal section
        Route::get('/personal/{id}/edit', [ProfileController::class, 'personal'])->name('profile.edit.personal');
        Route::put('/personal/{id}', [ProfileController::class, 'personalPost'])->name('profile.edit.personal.post');
        
        //about section
        Route::get('/about/{id}/edit', [ProfileController::class, 'about'])->name('profile.edit.about');
        Route::put('/about/{id}', [ProfileController::class, 'aboutPost'])->name('profile.edit.about.post');
        
        //experience section
        Route::get('/experience/{id}/edit', [ProfileController::class, 'experience'])->name('profile.edit.experience');
        Route::post('/experience/{id}', [ProfileController::class, 'experiencePost'])->name('profile.add.experience.post');
        Route::put('/experience/{id}/update/{expId}', [ProfileController::class, 'experiencePost'])->name('profile.edit.experience.post');
        Route::delete('/experience/{id}/delete/{expId}', [ProfileController::class, 'experienceDelete'])->name('profile.delete.experience.post');
        
        //education section
        Route::get('/education/{id}/edit', [ProfileController::class, 'education'])->name('profile.edit.education');
        Route::post('/education/{id}', [ProfileController::class, 'educationPost'])->name('profile.add.education.post');
        Route::put('/education/{id}/update/{educId}', [ProfileController::class, 'educationPost'])->name('profile.edit.education.post');
        Route::delete('/education/{id}/delete/{educId}', [ProfileController::class, 'educationDelete'])->name('profile.delete.education.post');

        //skill section
        Route::get('/skill/{id}/edit', [ProfileController::class, 'skill'])->name('profile.edit.skill');
        Route::post('/skill/{id}', [ProfileController::class, 'skillPost'])->name('profile.edit.skill.post');
        Route::delete('/skill/{id}/{skillId?}', [ProfileController::class, 'skillDelete'])->name('profile.delete.skill.post');
    });

    Route::get('/download/cv', FileController::class)->middleware('auth')->name('resume.download');

    //jobs related routes
    Route::prefix('jobs')->group(function() {
        //index 
        Route::get('/{id}', [JobsController::class, 'show'])->name('jobs.index');
        
        //create/edit
        Route::get('/listing/{id}/edit/{jobId?}', [JobsController::class, 'listing'])->name('jobs.edit.listing');    
        Route::post('/listing/{id}', [JobsController::class, 'listingPost'])->name('jobs.add.listing.post');
        Route::put('/listing/{id}/update/{jobId}', [JobsController::class, 'listingPost'])->name('jobs.edit.listing.post');
        //view
        Route::get('/listing/{id}/view/{jobId}', [JobsController::class, 'view'])->name('jobs.view.listing');
    });

    Route::get('/jobs/applications', function () {
        return view('job_applications');
    });

});
