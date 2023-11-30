@extends('master.app')

@section('title')
    permission
@endsection

@section('content')
    <div class="col-12">
        <div class="d-flex flex-row-reverse my-3">
            @can('role-create')
                <a href="{{route('permissions.create')}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Add New</a>
            @endcan
        </div>
        @include('alert-box.alert')
    </div>
    <div class="card">
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