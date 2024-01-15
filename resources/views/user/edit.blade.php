@extends('master.app')
@section('title')
    edit|user
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('users.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>Back</a>
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
                <h4>Update User</h4>
            </div>
            <form action="{{route('users.update',$user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required value="{{$user->name}}">
                </div>
                <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required value="{{$user->email}}">
                </div>
                <div class="mb-3">
                        <label for="">Role</label>
                        <select name="role" id="" class="form-control" required>
                            @foreach ($roles as $role)
                                @foreach ($user->getRoleNames() as $old_role)
                                    <option value="{{$old_role}}" selected hidden>{{$old_role}}</option>
                                @endforeach
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                </div>
                    <div class="mb-3 text-right">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection