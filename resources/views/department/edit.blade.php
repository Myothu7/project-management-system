@extends('master.app')

@section('content')
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pl-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Department List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Department Edit</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="h5">Department Edit</div>    
            </div>
            <div class="card-body">
                <div class="col-6">
                    <form action="{{route('department.update', $department->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-2">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$department->name}}" class="form-control">
                            @error('name')
                                    <div class="text-danger mt-2 font-italic">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="mb-2">
                            <label for="">Remark</label>
                            <textarea name="remark" id="" rows="3" class="form-control text-start">{{$department->remark}}</textarea>
                            @error('remark')
                                    <div class="text-danger mt-2 font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="text-right p-2 ">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
@endsection