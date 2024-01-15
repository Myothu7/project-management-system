@extends('master.app')
@section('title')
    employee
@endsection
@section('content')
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center my-3">
            <form class="d-flex" method="get">
                <input type="search" class="form-control-sm search" placeholder="Search..." name="search_data">
                <input type="submit" value="Search" class="btn btn-sm btn-primary ml-2">
                <a href="{{route('employee.index')}}" class="btn btn-sm btn-default ml-2"><i class="bi bi-arrow-repeat"></i></a>
            </form>
            @can('employee-create')
            <a href="{{route('employee.create')}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Add Employee</a>
        @endcan 
        </div>
        @include('alert-box.alert')
    </div>

    <div class="card">
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
                            <td>
                                {{ isset($user->role) ? $user->role :$user->employee->role }}
                            </td>
                            <td>
                                {{ isset($user->address) ? $user->address :$user->employee->address }}
                            </td>
                            <td>
                                {{ isset($user->ph_number) ? $user->ph_number :$user->employee->ph_number }}
                            </td>
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