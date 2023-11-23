@extends('master.app')

@section('title')
    Role
@endsection

@section('content')

    <div class="d-flex flex-row-reverse">
        @can('role-create')
            <a href="{{route('role.create')}}" class="btn btn-sm btn-success mt-3"><i class="bi bi-plus"></i>Add New</a>
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
            <div class="card-title">
                <h5>All Roles</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        @if(Auth::user()->roles[0]->name == "Super admin")
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            @if(Auth::user()->roles[0]->name == "Super admin")
                                <td>
                                    <div class="btn-group" >
                                        @can('role-edit')
                                            <a href="{{route('role.edit', $role->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                        @endcan
                                        @can('role-delete')
                                            <form action="{{url('role',$role->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                            </form> 
                                        @endcan
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection