@extends('master.app')
@section('title')
    add|user
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
                <h4>Add User</h4>
            </div>
            <form action="{{route('employee.update',$user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="mb-3 d-lg-flex col-lg-12">
                        <input type="hidden" name="user_type" value="employee">
                        <div class="mb-3 col-lg-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                        </div> 
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="{{$user->employee->role}}" hidden>{{$user->employee->role}}</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                                <option value="Leader">Leader</option>
                                <option value="Hr">Hr</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Departmet</label>
                            <select name="department_id" id="" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}" <?php if($department->id ==$user->employee->department_id){ ?> 
                                            selected
                                   <?php } ?>
                                    >
                                        {{$department->name}}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" required value="{{$user->employee->address}}">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Phone Number</label>
                            <input type="text" name="ph_number" class="form-control" required value="{{$user->employee->ph_number}}">
                        </div>
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                            <label for="">Image</label>
                            <input type="text" name="image" class="form-control" required value="{{$user->employee->image}}">
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