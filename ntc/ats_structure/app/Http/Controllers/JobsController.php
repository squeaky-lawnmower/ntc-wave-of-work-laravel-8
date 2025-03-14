<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class JobsController extends Controller
{
    function show($id = null) {
        
        if($id == null || $id != auth()->user()->id) {
            $id = auth()->user()->id;
            return redirect(route("home"))->with('error','Access Denied.');
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $jobs = Jobs::where('creator_id', $id)->orderByDesc('created_at')->get();

        $data = [
            'jobs' => $jobs
        ];

        return view("jobs.board", ['id', $id])->with($data);
    }

    function view($id, $jobId) {
        if($id == null || $id != auth()->user()->id) {
            $id = auth()->user()->id;
            return redirect(route("home"))->with('error','Access Denied.');
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $job = Jobs::where('id', $jobId)->first();
        $creator = User::where('id', $job->creator_id)->first();

        $data = [
            'job' => $job,
            'creator' => $creator
        ];

        return view("jobs.listing.view", ['id'=> $id, 'jobId' => $jobId])->with($data);
    }

    
    function details($jobId) {
        if($jobId == null) {
            return redirect(route("home"))->with('error','Unable to view job details.');
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $job = Jobs::where('id', $jobId)->first();
        $creator = User::where('id', $job->creator_id)->first();

        $data = [
            'job' => $job,
            'creator' => $creator
        ];

        return view("jobs.listing.viewPlain", ['id'=> auth()->user()->id, 'jobId' => $jobId])->with($data);
    }


    function listing($id = null, $jobId = null) {
        
        if($id == null || $id != auth()->user()->id) {
            $id = auth()->user()->id;
            return redirect(route("home"))->with('error','Access Denied.');
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $profile = User::where('id', $id)->first();

        if ($profile == null) {
            return redirect(route("home"))->with('error','Profile not found.');
        }

        $job = '';
        if ($jobId != null) {
            $job = Jobs::where('id', $jobId)->first();
        }

        return view("jobs.listing.edit", ['id', $id])->with('job', $job);
    }

    function listingPost(Request $request, $id, $jobId = null) {
        
        $request->validate([
            'job_code' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'hiring_start_date' => 'required',
            'hiring_end_date' => 'required',
            'contract_type' => 'required',
            'status' => 'required',
        ]);

        $message = "";
        if ($jobId != null) {
            $message = "Updated";
            $job = Jobs::where('id', $jobId)->first();
            $job->job_code = $request->job_code;
            $job->job_title = $request->job_title;
            $job->job_description = $request->job_description;
            $job->hiring_start_date = $request->hiring_start_date;
            $job->hiring_end_date = $request->hiring_end_date;
            $job->status = $request->status;
            $job->contract_type = $request->contract_type;
            $job->save();
        } else {    
            $message = "Added";
            $data['creator_id'] = $id;
            $data['job_code'] = $request->job_code;
            $data['job_title'] = $request->job_title;
            $data['job_description'] = $request->job_description;
            $data['hiring_start_date'] = $request->hiring_start_date;
            $data['hiring_end_date'] = $request->hiring_end_date;
            $data['status'] = $request->status;
            $data['contract_type'] = $request->contract_type;

            $job = Jobs::create($data);
            
            if (!$job) {
                return redirect(route('job.edit.listing', ['id'=> $id]))->with('error','Unable to save job.');
            }
        }

        return redirect(route('jobs.index', ['id'=> $id]))->with('success', $message.' Successfully'); 
    }

    function bubble($id) {
        if($id == null || $id != auth()->user()->id) {
            $id = auth()->user()->id;
            return redirect(route("home"))->with('error','Access Denied.');
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $jobs = Jobs::with('creator')->get();
        
        $data = [
            'jobs' => $jobs
        ];

        return view("jobs.listing.bubbles")->with($data);
    }

}
