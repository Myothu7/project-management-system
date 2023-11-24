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
                <h4>Add Project</h4>
            </div>
            <form action="{{route('projects.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3 d-lg-flex col-lg-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control" required>
                                    <option value="" hidden>--select option--</option>
                                    <option value="1">To Do</option>
                                    <option value="2">Progress</option>
                                    <option value="3">Done</option>
                            </select>
                        </div> 
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Version</label>
                            <input type="text" name="version" class="form-control" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control" required></textarea>
                                  
                        </div>
                    </div>    
                       
                    <div class="mb-3 col-12 text-right">
                        <input type="submit" value="Create" class="btn btn-primary">
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection