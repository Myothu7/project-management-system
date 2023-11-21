@extends('master.app')
@section('title')
    edit|user
@endsection
@section('content')
    <div class="d-flex flex-row-reverse">
        <a href="{{route('users.create')}}" class="btn btn-sm btn-success my-3">Add User</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>All Users</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @foreach ($user->getRoleNames() as $role)
                                <td>{{$role}}</td>
                            @endforeach
                            <td>
                                <div class="btn-group" >
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                    <button class="btn btn-sm btn-outline-primary" form="deleteForm" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash text-danger"></i></button>
                                </div>
                            </td>
                            <form action="{{route('users.destroy',$user->id)}}" method="post" id="deleteForm">
                                @csrf
                                @method('delete')
                            </form>  
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection