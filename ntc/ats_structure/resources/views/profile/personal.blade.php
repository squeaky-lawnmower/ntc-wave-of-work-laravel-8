@extends('layout')
@section('title', 'Edit Personal Details')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="{{route('profile', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h1 class="text-darkbluegreen">Edit Personal Details</h1>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="border-r rounded-r-lg">            
                <form action="{{route('profile.edit.personal.post', ['id' => auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-6 col-sm-6 col-md-6">
                            <x-form.input type="text" name="firstname" value="{{auth()->user()->firstname}}" />
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                            <x-form.input type="text" name="lastname" value="{{auth()->user()->lastname}}" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <x-form.input type="email" name="email" value="{{auth()->user()->email}}" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <x-form.input type="text" name="company"  value="{{auth()->user()->company ? auth()->user()->company : old('company')}}" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-10  col-sm-10 col-md-10">
                            <x-form.input type="text" name="address"  value="{{auth()->user()->address ? auth()->user()->address : old('address')}}" />
                        </div>
                        <div class="col-2  col-sm-2 col-md-2">
                            <x-form.input type="text" name="zipcode"  value="{{auth()->user()->zipcode ? auth()->user()->zipcode : old('zipcode')}}" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <x-form.input type="hidden" name="route_states" value="{{ route('list.states', ['country_code' => 'country_code'])}}" />
                        <x-form.input type="hidden" name="route_cities" value="{{ route('list.cities', ['province_code' => 'province_code'])}}" />
                        <x-form.input type="hidden" name="selected_state" value="{{ auth()->user()->state }}" />
                        <x-form.input type="hidden" name="selected_city" value="{{ auth()->user()->city }}" />    

                        <div class="col-4  col-sm-4 col-md-4">
                            <select class="form-select" name="country" 
                                onchange="updateStateList('{{ route('list.states', ['country_code' => 'country_code']) }}' , '{{ auth()->user()->state}}')" >
                                <option disabled>- Country -</option>
                                @foreach($countries as $country)
                                    @if(auth()->user()->country == $country->country_code)
                                        @php $selected = 'selected'; @endphp
                                    @else
                                        @php $selected = ''; @endphp
                                    @endif
                                    <option value={{$country->country_code}} {{$selected}}>{{$country->country_name}}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="col-4  col-sm-4 col-md-4">
                            <select class="form-select" name="state" 
                                onchange="updateCityList('{{ route('list.cities', ['province_code' => 'province_code']) }}', '{{ auth()->user()->city}}')"
                                onload="updateCityList('{{ route('list.cities', ['province_code' => 'province_code']) }}', '{{ auth()->user()->city}}')"
                                >
                                
                                <option disabled>- Province -</option>
                                </select>
                        </div>
                        <div class="col-4  col-sm-4 col-md-4">
                            <select class="form-select" name="city">
                                <option disabled>- City -</option>
                                </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6  col-sm-6 col-md-6">
                            <x-form.input type="text" name="phone" value="{{auth()->user()->phone ? auth()->user()->phone : old('phone')}}" />
                        </div>
                        <div class="col-6  col-sm-6 col-md-6">
                            <x-form.input type="date" name="birthdate" value="{{auth()->user()->birthdate ? auth()->user()->birthdate : old('birthdate')}}" />
                        </div>
                    </div>      
                    @if('jobseeker' == auth()->user()->account_type && auth()->user()->id == $id)        
                        <div class="row mt-2">
                            <div class="col-8 col-sm-8 col-md-8 mt-3">
                                <x-form.input type="file" name="resume_filename" value="{{auth()->user()->resume_filename ? auth()->user()->resume_filename : old('resume_filename') }}" />
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 mt-auto">
                                @if(auth()->user()->resume_filename != null)
                                    <br />
                                    <h6><a href="{{route('resume.download')}}" target="_blank">View Uploaded Resume</a></h6>
                                @else
                                    <br />
                                    <h6 class="form-label">You haven't uploaded a resume yet.</h6>               
                                @endif
                            </div>
                        </div>      
                    @endif
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary full-width">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection