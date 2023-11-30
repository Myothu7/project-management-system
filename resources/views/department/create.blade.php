@extends('master.app')
@section('title')
    add | department
@endsection
@section('content')
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('employee.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>back</a>
        </div>
         <div class="card">
            <div class="card-header">
                <div class="h5">Create Department</div> 
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form action="{{route("department.store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-lg-6 form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <div class="text-danger mt-2 font-italic">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Remark</label>
                                <textarea name="remark" id="" cols="30" rows="4" class="form-control"></textarea>
                                @error('remark')
                                    <div class="text-danger mt-2 font-italic">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right p-2 col-lg-6">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
@endsection