<?php

use App\Models\Jobs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\JobApplicationsController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/sendMail/{email_type?}/{email?}', [MailController::class, 'sendMail'])->name('sendMail');

//support related routes
Route::prefix('support')->group(function() {
    Route::get('/', [SupportController::class, 'show'])->name('support.page');
    Route::post('/save',[SupportController::class, 'supportPost'])->name('support.post');
});

//registration related routes
Route::prefix('registration')->group(function() {
    Route::get('/', [AuthController::class, 'registration'])->name('registration');
    Route::get('/{account_type}/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/{account_type}/save', [AuthController::class, 'registrationPost'])->name('registration.post');
    Route::get('/{id}/activation', [AuthController::class, 'activation'])->name('activation');
});

    //password related routes
Route::prefix('password')->group(function() {
    Route::get('/forgot', [AuthController::class, 'forgotpass'])->name('forgotpass');
    Route::get('/reset', [AuthController::class, 'resetpass'])->name('resetpass');
    Route::post('/reset/{id}/send', [AuthController::class, 'resetpassPost'])->name('password.reset.post');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/search', [SearchController::class, 'searchGet'])->name('search.get');
    
    //profile related routes
    Route::prefix('messages')->group(function() {
        Route::get('/{id}', [MessagesController::class, 'show'])->name('messages');
        Route::get('/{id}/list', [MessagesController::class, 'list'])->name('messages.list');
        Route::get('/{id}/exchange', [MessagesController::class, 'exchange'])->name('messages.exchange');
        Route::post('/{id}/send', [MessagesController::class, 'send'])->name('messages.send');
        Route::post('/{id}/start', [MessagesController::class, 'start'])->name('messages.start');
    });

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
        Route::get('/candidates/{search}', [ProfileController::class, 'candidates'])->name('candidates');
        Route::get('/upload/photo/', [ProfileController::class, 'uploadPhoto'])->name('upload.photo');
        Route::post('/upload/photo/{id}', [ProfileController::class, 'uploadPhotoPost'])->name('upload.photo.post');
        
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
        Route::get('/listing/{id}/view/{jobId?}', [JobsController::class, 'view'])->name('jobs.view.listing');
        Route::get('/listing/{jobId}/details', [JobsController::class, 'details'])->name('jobs.details.listing');
        Route::get('/listing/{id}/bubble/{jobIds?}', [JobsController::class, 'bubble'])->name('jobs.bubble.listing');
        //applications
        Route::get('/applications/{id}', [JobApplicationsController::class, 'show'])->name('jobs.index.applications');
        Route::get('/applications/{jobId}/apply', [JobApplicationsController::class, 'save'])->name('jobs.save.applications');
        Route::post('/applications/{jobId}/save', [JobApplicationsController::class, 'savePost'])->name('jobs.save.applications.post');
        Route::put('/applications/{jobApplicationId}/update', [JobApplicationsController::class, 'updatePost'])->name('jobs.update.applications.post');
    });

    Route::prefix('list')->group(function() {
        Route::get('/states/{country_code}', [ListController::class, 'listStates'])->name('list.states');
        Route::get('/cities/{province_code}', [ListController::class, 'listCities'])->name('list.cities');
    });

});
