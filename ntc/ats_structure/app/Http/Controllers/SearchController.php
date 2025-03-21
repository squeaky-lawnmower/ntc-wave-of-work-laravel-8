<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{
    function search(Request $request) {
        
        if('jobseeker' == auth()->user()->account_type) {
            $users = User::where('company', 'like', '%'.$request->searchbar.'%')->get();
            $creator = [];
            if(!is_null($users)) {
                foreach($users as $user) {
                    $creator[] = $user->id;
                }
            } 

            $jobs = 
                Jobs::with('creator')
                ->where('job_code','like','%'.$request->searchbar.'%')
                ->orWhere('job_title','like','%'.$request->searchbar.'%')
                ->orWhere('job_description','like','%'.$request->searchbar.'%')
                ->orWhereIn('creator_id', $creator)
                ->orderByDesc('created_at')
                ->get();
            
            $data = [
                'jobs' => $jobs
            ];

            return view("dashboard")->with($data);
        }

        if('employer' == auth()->user()->account_type) {

            if (is_null($request->searchbar)) {
                $request->searchbar = 'list_all';
            }            
            return redirect(route('candidates', ['search' => $request->searchbar]));
            
        }

        return redirect()->route("home");
    }

    function searchGet() {
        return redirect()->route("home");
    }
}
