@extends('master.app')

@section('title')
    Role
@endsection

@section('content')

    <div class="d-flex flex-row-reverse">
        @can('role-create')
            <a href="{{route('permissions.create')}}" class="btn btn-sm btn-success mt-3"><i class="bi bi-plus"></i>Add New</a>
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

     {{-- upload success alert --}}
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
                <h5>All Permissions</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                <div class="btn-group" >
                                    @can('permission-edit')
                                        <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                    @endcan
                                    @can('permission-delete')
                                        <form action="{{url('permissions',$permission->id)}}" method="post" class="btn btn-sm btn-outline-primary">
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
                {{ $permissions->links() }}
            </table>
        </div>
    </div>
@endsection