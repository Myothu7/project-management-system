@extends('master.app')

@section('content')
    <div class="d-flex flex-row-reverse">
        @can('department-create')
            <a href="{{route('department.create')}}" class="btn btn-sm btn-success mt-3"><i class="bi bi-plus"></i>Add New</a>
        @endcan
    </div>
    {{-- <div class="col-lg-6 col-12">
        <form class="d-flex mb-3" method="get">
            <input type="search" class="form-control-sm search" placeholder="Search Name" name="name">
            <input type="submit" value="Search" class="btn btn-sm btn-primary ml-2">
            <a href="{{route('department.index')}}" class="btn btn-sm btn-default ml-2"><i class="bi bi-arrow-repeat"></i></a>
        </form>
    </div> --}}
    <div class="col-12">
          {{-- department upload success alert --}}
        @if(session("upload_success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('upload_success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
      @endif
         {{-- department delete success alert --}}
        @if(session("delete"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

          {{-- department delete success alert --}}
        @if(session("no-delete"))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('no-delete')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        {{-- department update success alert --}}    
        @if(session("update_success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('update_success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                    <h5>Department List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
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