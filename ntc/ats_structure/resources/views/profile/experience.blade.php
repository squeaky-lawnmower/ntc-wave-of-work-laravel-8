@extends('layout')
@section('title', 'Work Experience')
@section('content')
    <div><p>&nbsp;</p></div>
    <div class="card-container ms-auto me-auto mt-10 mb-10 col-sm-6">
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1">
                <h3><a href="{{route('profile', ['id' => auth()->user()->id])}}" class="anchor-regular"><i class="fa fa-angle-left">&nbsp;&nbsp;</i></a></h3>
            </div>
            <div class="col-11 col-sm-11 col-md-11">
                <span>
                    <h1 class="text-darkbluegreen text-center">Work Experience</h1>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="background: #FAFAFA;" class="mt-5 mb-5">            
                <form action="{{route('profile.add.experience.post', ['id' => auth()->user()->id])}}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="company"  value="">
                            @if($errors->has('company'))
                            <div class="text-danger">{{ $errors->first('company') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" value="">
                            @if($errors->has('position'))
                                <div class="text-danger">{{ $errors->first('position') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12  col-sm-12 col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows=4></textarea>
                            @if($errors->has('description'))
                                <div class="text-danger">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>                    
                    <div class="row mt-2">
                        <div class="col-6  col-sm-6 col-md-6">
                            <x-form.month_year name="start" monthValue="" yearValue=""/>
                        </div>
                        <div class="col-6  col-sm-6 col-md-6">
                            <x-form.month_year name="end" monthValue="" yearValue=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  col-sm-12 col-md-12 mt-3 mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;</i>Add New</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @foreach ($experiences as $experience)
        <hr/>    
        <div class="row">
                <div class="col-11" class="mt-5 mb-5">        
                    <form action="{{route('profile.edit.experience.post', ['id' => auth()->user()->id, 'expId' => $experience->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-2">
                            <div class="col-12  col-sm-12 col-md-12">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" name="company"  value="{{$experience->company}}">
                                @if($errors->has('company'))
                                <div class="text-danger">{{ $errors->first('company') }}</div>
                            @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12  col-sm-12 col-md-12">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control" name="position" value="{{$experience->position}}">
                                @if($errors->has('position'))
                                    <div class="text-danger">{{ $errors->first('position') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12  col-sm-12 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows=4>{{$experience->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>                    
                        <div class="row mt-2">
                            <div class="col-6  col-sm-6 col-md-6">
                                
                                <x-form.month_year name="start" monthValue="{{$experience->start_month}}" yearValue="{{$experience->start_year}}"/>
                            </div>
                            <div class="col-6  col-sm-6 col-md-6">
                                <x-form.month_year name="end" monthValue="{{$experience->end_month}}" yearValue="{{$experience->end_year}}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12  col-sm-12 col-md-12 mt-3 mb-3 ">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save">&nbsp;&nbsp;</i>Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-1 col-md-1 col-1">
                    <form action="{{route('profile.delete.experience.post', ['id' => auth()->user()->id, 'expId' => $experience->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>    
                </div>
            </div>
        @endforeach

    </div>
    <div class="mt-8"><h3>&nbsp;</h3></div>
@endsection