@extends('master.app')
@section('title')
    edit|user
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <a href="{{route('users.index')}}" class="btn btn-sm btn-success my-3">Back</a>
        </div>
      
        <div class="card">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
            <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
            </div>
            <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}" readonly>
            </div>
            <div class="mb-3">
                    <label for="">Role</label>
                    @foreach ($user->getRoleNames() as $old_role)
                        <input type="text" value="{{$old_role}}" class="form-control" readonly>
                    @endforeach
            </div>
            </div>   
        </div>
    </div>
</div>
@endsection