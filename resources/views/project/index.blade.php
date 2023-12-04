@extends('master.app')
@section('title')
    project
@endsection
@section('content')
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center my-3">
            <form class="d-flex" method="get">
                {{-- <input type="search" class="form-control-sm search" placeholder="Search..." name="search_data">
                <input type="submit" value="Search" class="btn btn-sm btn-primary ml-2"> --}}
                {{-- <a href="{{route('projects.index')}}" class="btn btn-sm btn-default ml-2"><i class="bi bi-arrow-repeat"></i></a> --}}
            </form>
            {{-- @can('user-create') --}}
                <a href="{{route('projects.create')}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Add New</a>
            {{-- @endcan    --}}
        </div>
        @include('alert-box.alert')
    </div>
    
    <div class="card">
        <div class="card-header">
            <h5>All Projects</h5>
        </div>
        <div class="card-body">
            {{-- {{ $users->links() }} --}}
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        {{-- <th>Status</th> --}}
                        <th>Version</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->description}}</td>
                            {{-- <td>{{$project->status == 1? 'To Do' :($project->status == 2 ? 'Progress': 'Done') }}</td> --}}
                            <td>
                                @foreach ($project->versions as $v)
                                    <li>v-{{$v->version_number}}</li>
                                @endforeach
                            </td>
                            <td class=""> 
                                {{-- d-flex align-items-center --}}
                                <div class="btn-group " >
                                    <a href="{{route('version.index','project_id='. $project->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-list-task text-dark"></i></a>
                                    {{-- @can('user-detail') --}}
                                        <a href="{{route('projects.show', $project->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-slash"></i></a>
                                    {{-- @endcan
                                    @can('user-edit') --}}
                                        <a href="{{route('projects.edit', $project->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square text-success"></i></a>
                                    {{-- @endcan
                                    @can('user-delete')     --}}
                                        <form action="{{url('projects',$project->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                        </form>  
                                    {{-- @endcan     --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection