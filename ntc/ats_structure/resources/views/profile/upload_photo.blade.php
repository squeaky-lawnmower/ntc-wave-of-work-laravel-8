@extends('layout')
@section('title', 'Upload Photo')
@section('content')
    <div><p>&nbsp;</p></div>
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="{{ route('profile', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h1 class="text-darkbluegreen">Upload Profile Photo</h1>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('upload.photo.post', ['id' => auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2 text-center">
                        <div class="col-sm-12 col-12 col-md-12 d-flex justify-content-center" >
                            @php
                                if(auth()->user()->profile_photo) {
                                    $profile_photo = 'storage/photos/'.str_replace('public/photos/', '', auth()->user()->profile_photo);
                                } else {
                                    $profile_photo = 'images/user_profile.png';
                                }
                            @endphp
                            <div 
                            class="profile-picture" 
                                style="padding: 30px; margin: 30px; height: 200px; width: 200px; 
                                background-image : url({{ asset($profile_photo) }})"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8 col-sm-8 col-md-8 mt-3">
                            <x-form.input type="file" name="profile_photo" value="{{auth()->user()->profile_photo ? auth()->user()->profile_photo : old('profile_photo') }}" />
                            <label class="form-label"><i>Image extentions : JPEG, JPG, PNG; Maximum size: 10mb</i></label>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 mt-3 d-flex align-bottom">
                            <button type="submit" class="btn btn-primary full-width">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection