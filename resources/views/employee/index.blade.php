@extends('master.app')
@section('title')
    edit|user
@endsection
@section('content')
    <div class="d-flex flex-row-reverse">
        @can('employee-create')
            <a href="{{route('employee.create')}}" class="btn btn-sm btn-success mt-3"><i class="bi bi-plus"></i>Add Employee</a>
        @endcan    
    </div>
     {{-- upload success alert --}}
    @if(session("account-success"))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('account-success')}}
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
            <h5>All Employees</h5>
        </div>
        <div class="card-body">
            {{-- {{ $employees->links() }} --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->employee->role}}</td>
                            <td>{{$user->employee->address}}</td>
                            <td>{{$user->employee->ph_number}}</td>
                            <td>
                                <div class="btn-group" >
                                        <a href="{{route('employee.show', $user->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-slash"></i></a>
                                   
                                        <a href="{{route('employee.edit', $user->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                      
                                        <form action="{{url('employee',$user->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                        </form>    
                                </div>
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection