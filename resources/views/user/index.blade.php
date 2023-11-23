@extends('master.app')
@section('title')
    edit|user
@endsection
@section('content')
    <div class="d-flex flex-row-reverse">
        @can('user-create')
            <a href="{{route('users.create')}}" class="btn btn-sm btn-success mt-3"><i class="bi bi-plus"></i>Add User</a>
        @endcan    
    </div>
     {{-- upload success alert --}}
    @if(session("upload-success"))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('upload-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

      {{-- update success alert --}}
    @if(session("update-success"))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('update-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  
    {{-- delete success alert --}}
    @if(session("delete-success"))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            {{ session('delete-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header">
            <h5>All Users</h5>
        </div>
        <div class="card-body">
            {{ $users->links() }}
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
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @foreach ($user->getRoleNames() as $role)
                                <td>{{$role}}</td>
                            @endforeach
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