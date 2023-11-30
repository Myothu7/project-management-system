@extends('master.app')
@section('title')
    department
@endsection
@section('content')

    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center my-3">
            <form class="d-flex" method="get">
                <input type="search" class="form-control-sm search" placeholder="Search..." name="search_data">
                <input type="submit" value="Search" class="btn btn-sm btn-primary ml-2">
                <a href="{{route('department.index')}}" class="btn btn-sm btn-default ml-2"><i class="bi bi-arrow-repeat"></i></a>
            </form>
            @can('department-create')
                <a href="{{route('department.create')}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Add New</a>
            @endcan
        </div>
        @include('alert-box.alert')
    </div>
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                    <h5>All Departments</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($departments as $key => $department)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->remark}}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('department.edit', $department->id)}}"class='btn btn-outline-primary btn-sm' >
                                                    <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{url('department',$department->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                            </form>  
                                        </div>
                                     </div>
                                </td>
                            </tr>
                            @empty 
                            <tr><td colspan="6" class="text-center">Empty Data!</td></tr>

                        @endforelse

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection