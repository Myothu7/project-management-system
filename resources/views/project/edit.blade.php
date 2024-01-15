@extends('master.app')
@section('title')
    edit | project
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('projects.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>back</a>
        </div>
         {{-- validation error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       
        <div class="card">
            <div class="card-header">
                <h4>Update Project</h4>
            </div>
            <form action="{{route('projects.update',$project->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="mb-3 d-lg-flex col-lg-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required value="{{$project->name}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control" required>
                                    <option value="{{$project->status}}" hidden>{{$project->status == 1? 'To Do' :($project->status == 2 ? 'Progress': 'Done') }}</option>
                                    <option value="1">To Do</option>
                                    <option value="2">Progress</option>
                                    <option value="3">Done</option>
                            </select>
                        </div> 
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control" required>{{$project->description}}</textarea>
                        </div>
                    </div>    
                       
                    <div class="mb-3 col-12 text-right">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection