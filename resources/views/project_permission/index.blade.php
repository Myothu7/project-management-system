@extends('master.app')
@section('title')
    project_permission
@endsection
@section('content')
    <div class="col-12">
        <div class="d-flex flex-row-reverse my-3">
            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus"></i>Add New</a>  
        </div> 
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Project Permission</div>
        </div>
        <div class="card-body">
            <table class="table border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project</th>
                        <th>Permission Employee</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $i = 1; ?>
                    @foreach ($projects as $project)
                        <tr> 
                            <td>
                                {{$project->id}}
                            </td>
                            <td>
                                {{$project->name}}
                            </td>
                            <td>
                                @foreach ($project_permission as $data)
                                    @if ($project->id == $data->id)
                                       <li>{{$data->uname}}</li>
                                    @endif
                                @endforeach   
                            </td>
                            <td>
                                <div class="btn-group" >
                                    {{-- @can('role-edit') --}}
                                        <a href="{{route('project_permission.edit', $project->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                    {{-- @endcan
                                    @can('role-delete') --}}
                                        <form action="{{url('project_permission',$project->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                        </form> 
                                    {{-- @endcan --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('project_permission.create')
@endsection
