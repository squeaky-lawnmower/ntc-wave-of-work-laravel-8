@extends('layout')
@section('title', 'Skills')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="{{route('profile', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h1 class="text-darkbluegreen text-center">Skills</h1>
                </span>
            </div>
        </div>
        <div class="row">
            <form action="{{route('profile.edit.skill.post', ['id' => auth()->user()->id])}}" method="POST">
                @csrf
                <div class="col-12 col-sm-12 col-md-12" class="mt-5 mb-5">            
                    <div class="row mt-2">
                        <div class="col-sm-11 col-md-11 col-11 ">
                            <x-form.input type="text" name="skill" value=""/>
                        </div>
                        <div class="col-1 col-sm-1 col-md-1 mt-auto">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @foreach ($skills as $skill)
        <hr/>    
        <div class="row">
                <div class="col-12" class="mt-5 mb-5">        
                    <form action="{{route('profile.delete.skill.post', ['id' => auth()->user()->id, 'skillId' => $skill->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="row">
                            <div class="col-11 mt-auto mb-auto">            
                                    <h6>{{$skill->skill_name}}</h6>
                            </div>
                            <div class="col-1  col-sm-1 col-md-1 mb-auto mt-auto">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection