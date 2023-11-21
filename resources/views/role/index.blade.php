@extends('master.app')

@section('title')
    Role
@endsection

@section('content')
    <div class="d-flex flex-row-reverse">
        <a href="{{route('role.create')}}" class="btn btn-sm btn-success my-3">Add New</a>
    </div>
     {{-- upload success alert --}}
     @if(session("update-success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('update-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
     @endif
      {{-- delete success alert --}}
      @if(session("delete-success"))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('delete-success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
   @endif
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>All Roles</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <div class="btn-group" >
                                    <a href="{{route('role.edit', $role->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                    <button class="btn btn-sm btn-outline-primary" form="deleteForm" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash text-danger"></i></button>
                                </div>
                            </td>
                            <form action="{{route('role.destroy',$role->id)}}" method="post" id="deleteForm">
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