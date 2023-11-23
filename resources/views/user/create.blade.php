@extends('master.app')
@section('title')
    add|user
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('users.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>back</a>
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
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3 d-lg-flex col-lg-12">
                        <input type="hidden" name="user_type" value="admin">
                        <div class="mb-3 col-lg-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div> 
                    </div>
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="mb-3 col-lg-6">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control" required>
                                    <option value="" hidden>--select option--</option>
                                    @foreach ($roles as $key => $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                    @endforeach
                                </select>   
                        </div>
                        <div class="mb-3 col-lg-6">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>    
                    <div class="mb-3 d-lg-flex col-12">
                        <div class="col-lg-6"></div>
                        <div class="mb-3 col-lg-6">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
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