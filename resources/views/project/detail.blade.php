@extends('master.app')
@section('title')
    add|project
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('projects.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>back</a>
        </div>
       
        <div class="card">
            <div class="card-header">
                <h4>Detail Project</h4>
            </div>
            <div class="card-body">
                <div class="mb-3 d-lg-flex col-lg-12">
                    <div class="mb-3 col-lg-6">
                        <label for="">Name</label>
                        <input type="text" value="{{$project->name}}" class="form-control" readonly>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="">Status</label>
                        <input type="text" value="{{$project->status == 1? 'To Do' :($project->status == 2 ? 'Progress': 'Done') }}" class="form-control" readonly>
                    </div> 
                </div>
                <div class="mb-3 d-lg-flex col-12">
                    <div class="mb-3 col-lg-6">
                        <label for="">Version</label>
                        <input type="text" value="{{$project->version}}" class="form-control" readonly>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="">Description</label>
                        <textarea id="" cols="30" rows="3" class="form-control" readonly>{{$project->description}}</textarea>
                                
                    </div>
                </div>    
               
            </div>    
        </div>
    </div>
</div>
@endsection