@extends('master.app')
@section('title')
    user
@endsection
@section('content')
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center my-3">
            <form class="d-flex" method="get">
                <input type="search" class="form-control-sm search" placeholder="Search..." name="search_data">
                <input type="submit" value="Search" class="btn btn-sm btn-primary ml-2">
                <a href="{{route('users.index')}}" class="btn btn-sm btn-default ml-2"><i class="bi bi-arrow-repeat"></i></a>
            </form>
            @can('user-create')
                <a href="{{route('users.create')}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Add User</a>
            @endcan   
        </div>
        @include('alert-box.alert')
    </div>

    <div class="card">
        <div class="card-header">
            <h5>All Users</h5>
        </div>
        <div class="card-body">
            {{-- {{ $users->links() }} --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =0;    
                    @endphp
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$position[$i++]}}</td>
                            <td>
                                <div class="btn-group" >
                                    @can('user-detail')
                                        <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-slash"></i></a>
                                    @endcan
                                    @can('user-edit')
                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                    @endcan
                                    @can('user-delete')    
                                        <form action="{{url('users',$user->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                        </form>  
                                    @endcan    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection