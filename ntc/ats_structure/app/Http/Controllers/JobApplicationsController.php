<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use App\Models\UserAbout;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JobApplicationsController extends Controller
{

    function show($id) 
    {
        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $user = User::where('id', $id)->first();
        $job_applications = JobApplications::with('jobDetails')->where('user_id', $id)->get();

        $data = [
            'user' => $user,
            'job_applications' => $job_applications
        ];

        return view("jobs.applications.index")->with($data);        
    }


    function save($jobId) 
    {
        $id = auth()->user()->id;

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $job = Jobs::where('id', $jobId)->first();
        $creator = User::where('id', $job->creator_id)->first();

        $about = UserAbout::where('user_id', $id)->first();
        $experiences = UserExperience::where('user_id', $id)->orderByDesc('end_year')->get();
        $education = UserEducation::where('user_id', $id)->orderByDesc('end_year')->get();
        $skills = UserSkill::where('user_id', $id)->get();

        $data = [
            'job' => $job,
            'creator' => $creator,
            'about' => $about,
            'experiences' => $experiences,
            'education' => $education,
            'skills' => $skills
        ];

        return view("jobs.applications.save")->with($data);        
    }

    function savePost( $jobId ) {
        
        $id = auth()->user()->id;
        $condition = [
            'user_id' => $id,
            'job_id' => $jobId
        ];
        
        $job_application = JobApplications::where($condition)->first();


        $message = "";
        if ($job_application != null) {
            $message = "Updated";
            $job_application->user_id = auth()->user()->id;
            $job_application->job_id = $jobId;
            $job_application->status = 'pending';
            $job_application->application_start_date = date("Y-m-d");
            $job_application->application_end_date = null;
            $job_application->hired_by = auth()->user()->id;
            $job_application->save();
        } else {    
            $message = "Added";
            $data['user_id'] = $id;
            $data['job_id'] = $jobId;
            $data['status'] = 'pending';
            $data['application_start_date'] = date("Y-m-d");
            $data['hired_by'] = auth()->user()->id;

            $job_application = JobApplications::create($data);
            
            if (!$job_application) {
                return redirect()->back()->with('error','Unable to submit application.');
            }
        }

        return redirect(route('jobs.index.applications', ['id'=> $id]))->with('success', $message.' Successfully');     
    }

}
