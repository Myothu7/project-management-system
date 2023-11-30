@extends('master.app')
@section('title')
    detail | employee
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('employee.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>back</a>
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
                <h4>Employee Information</h4>
            </div>
                <div class="card-body">
                    <div class="mb-3 d-lg-flex col-lg-12">
                        <input type="hidden" name="user_type" value="employee">
                        <div class="mb-3 col-lg-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" readonly>
                        </div> 
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Role</label>
                            <input type="text" value="{{$user->employee->role}}" class="form-control" readonly>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Departmet</label>
                            <input type="text" value="{{$department[0]->name}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" readonly value="{{$user->employee->address}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Phone Number</label>
                            <input type="text" name="ph_number" class="form-control" readonly value="{{$user->employee->ph_number}}">
                        </div>
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Image</label>
                            <input type="text" name="image" class="form-control" readonly value="{{$user->employee->image}}">
                        </div>
                    </div>        
                </div>  
        </div>
    </div>
</div>
@endsection