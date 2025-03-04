<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAbout;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use App\Models\UserEducation;
use App\Models\UserExperience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    function show($id = null) {
        
        if($id == null) {
            $id = auth()->user()->id;
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $profile = User::where('id', $id)->first();
        $about = UserAbout::where('user_id', $id)->first();
        $experiences = UserExperience::where('user_id', $id)->orderByDesc('end_year')->get();
        $education = UserEducation::where('user_id', $id)->orderByDesc('end_year')->get();
        $skills = UserSkill::where('user_id', $id)->get();

        if ($profile == null) {
            return redirect(route("home"))->with('error','Profile not found.');
        }

        $data = [
            'id' => $id,
            'profile' => $profile,
            'about' => $about,
            'experiences' => $experiences,
            'education' => $education,
            'skills' => $skills
        ];

        return view("profile.index", ['id', $id])->with($data);
    }

    function personal($id = null) {
        
        if($id == null) {
            $id = auth()->user()->id;
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $profile = User::where('id', $id)->first();

        if ($profile == null) {
            return redirect(route("home"))->with('error','Profile not found.');
        }

        return view("profile.personal", ['id', $id])->with('id', $id);
    }

    function personalPost(Request $request, $id) {

        $profile = User::findOrFail($id);  
        
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            "resume_filename" => 'sometimes|mimes:pdf|max:10000'
        ]);

        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->address = $request->address;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->zipcode = $request->zipcode;
        $profile->phone = $request->phone;

        if($request->hasFile('resume_filename')) {
            File::delete(storage_path('app/private/'.$profile->resume_filename));
            $profile->resume_filename = $request->file('resume_filename')->store('cv');
        }
        

        $profile->save();

        return redirect(route('profile', ['id'=> $id]))->with('success', 'Update Successful');        
        
    }

    function about($id) {
        
        if($id == null) {
            $id = auth()->user()->id;
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $about = UserAbout::where('user_id', $id)->first();

        if ($about == null) {
            return redirect(route("home"))->with('error','Profile details not found.');
        }

        return view("profile.about", ['id' => $id])->with('about', $about);
    }

    function aboutPost(Request $request, $id) {
        
        $about = UserAbout::where('user_id', $id)->first();
        
        $request->validate([
            'about' => 'required',
        ]);

        $about->about = $request->about;
        $about->save();

        return redirect(route('profile', ['id'=> $id]))->with('success', 'Update Successful');     
    }

    function experience($id) {
        
        if($id == null) {
            $id = auth()->user()->id;
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $experiences = UserExperience::where('user_id', $id)->orderByDesc('updated_at')->get();

        return view("profile.experience", ['id' => $id])->with('experiences', $experiences);
    }    

    function experiencePost(Request $request, $id, $expId = null) {
        
        $request->validate([
            'company' => 'required',
            'position' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
        ]);

        $message = "";
        if ($expId != null) {
            $message = "Updated";
            $experience = UserExperience::where('id', $expId)->first();
            $experience->company = $request->company;
            $experience->position = $request->position;
            $experience->description = $request->description;
            $experience->start_month = $request->start_month;
            $experience->start_year = $request->start_year;
            $experience->end_month = $request->end_month;
            $experience->end_year = $request->end_year;
            $experience->save();
        } else {    
            $message = "Added";
            $data['user_id'] = $id;
            $data['company'] = $request->company;
            $data['position'] = $request->position;
            $data['description'] = $request->description;
            $data['start_month'] = $request->start_month;
            $data['start_year'] = $request->start_year;
            $data['end_month'] = $request->end_month;
            $data['end_year'] = $request->end_year;

            $experience = UserExperience::create($data);
            
            if (!$experience) {
                return redirect(route('profile.edit.experience', ['id'=> $id]))->with('error','Unable to save new work experience.');
            }
        }

        return redirect(route('profile.edit.experience', ['id'=> $id]))->with('success', $message.' Successfully');     
    }

    function experienceDelete(Request $request, $id, $expId) {
        $deleted = UserExperience::where('id', $expId)->delete();
        if (!$deleted) {
            return redirect(route('profile.edit.experience', ['id'=> $id]))->with('error','Unable to delete work experience.');
        }
        return redirect(route('profile.edit.experience', ['id'=> $id]))->with('success', 'Deleted Successfully');     
    }

    function education($id) {

        if($id == null) {
            $id = auth()->user()->id;
        }

        if(!Auth::check()) {
            return redirect(route('login'));
        }

        $education = UserEducation::where('user_id', $id)->orderByDesc('end_year')->get();

        return view("profile.education", ['id' => $id])->with('education', $education);
    }    

    function educationPost(Request $request, $id, $educId = null) {
        
        $request->validate([
            'school' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
        ]);

        $message = "";
        if ($educId != null) {
            $message = "Updated";
            $education = UserEducation::where('id', $educId)->first();
            $education->school = $request->school;
            $education->degree = $request->degree;
            $education->start_month = $request->start_month;
            $education->start_year = $request->start_year;
            $education->end_month = $request->end_month;
            $education->end_year = $request->end_year;
            $education->save();
        } else {    
            $message = "Added";
            $data['user_id'] = $id;
            $data['school'] = $request->school;
            $data['degree'] = $request->degree;
            $data['start_month'] = $request->start_month;
            $data['start_year'] = $request->start_year;
            $data['end_month'] = $request->end_month;
            $data['end_year'] = $request->end_year;

            $education = UserEducation::create($data);
            
            if (!$education) {
                return redirect(route('profile.edit.education', ['id'=> $id]))->with('error','Unable to save new education history.');
            }
        }

        return redirect(route('profile.edit.education', ['id'=> $id]))->with('success', $message.' Successfully');     
    }
   
    function educationDelete(Request $request, $id, $educId) {
        $deleted = UserEducation::where('id', $educId)->delete();
        if (!$deleted) {
            return redirect(route('profile.edit.education', ['id'=> $id]))->with('error','Unable to delete education history.');
        }
        return redirect(route('profile.edit.education', ['id'=> $id]))->with('success', 'Deleted Successfully');     
    }

    function skill($id) {
        
        if($id == null) {
            $id = auth()->user()->id;
        }
    
        if(!Auth::check()) {
            return redirect(route('login'));
        }
    
        $skills = UserSkill::where('user_id', $id)->get();
    
        return view("profile.skill", ['id' => $id])->with('skills', $skills);
    }
    
    function skillPost(Request $request, $id) {
        
        $request->validate([
            'skill' => 'required'
        ]);
    
        $data['user_id'] = $id;
        $data['skill_name'] = $request->skill;
    
        $skills = UserSkill::create($data);
        
        if (!$skills) {
            return redirect(route('profile.edit.skill', ['id'=> $id]))->with('error','Unable to save new skill.');
        }
    
        return redirect(route('profile.edit.skill', ['id'=> $id]))->with('success', 'Add Successful');     
    }
    
    function skillDelete(Request $request, $id, $skillId) {
        $deleted = UserSkill::where('id', $skillId)->delete();
        if (!$deleted) {
            return redirect(route('profile.edit.skill', ['id'=> $id]))->with('error','Unable to delete skill.');
        }
        return redirect(route('profile.edit.skill', ['id'=> $id]))->with('success', 'Deleted Successfully');     
    }

}


