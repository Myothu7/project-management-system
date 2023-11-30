@extends('master.app')
@section('title')
    create | version
@endsection
@section('content')

    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('projects.index')}}" class="btn btn-sm btn-primary my-3"><i class="bi bi-chevron-left"></i>back</a>
            <div data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-success">
                <i class="bi bi-plus"></i>Add New  
            </div>
        </div>

        @include('alert-box.alert')
    </div>    
       
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>All Versions ( {{$project->name}} )</h5>
                </div>    
            </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr><th>ID</th><th>Name</th><th>Departments PICs </th><th>Remark</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($version as $v)
                            <form action="{{route('tasks.index')}}" method="get">
                                <tr>
                                    <td>{{$v->id}}
                                        <input type="hidden" name="project_id" value="{{$project->id}}">
                                    </td>
                                    <td>v-{{$v->version_number}}
                                        <input type="hidden" name="version_id" value="{{$v->id}}">
                                    </td>
                                    <td>
                                        <ol class="m-0">
                                    @foreach ($asign_deparments as $ass)
                                        @if ($ass->version_id == $v->id)
                                            <li>{{$ass->name}}</li>
                                        @endif
                                    @endforeach
                                        </ol>
                                    </td>
                                    <td>{{$v->remark}}</td>
                                    <td>    
                                        <div class="btn-group" > 
                                            <button class="btn btn-sm btn-outline-primary" type="success">
                                                <i class="bi bi-fast-forward"></i>
                                            </button>
                                        </form>       
                                            <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#edit{{$v->id}}"><i class="bi bi-pencil-square text-success"></i></a>
                                            <form action="{{route('version.destroy',$v->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                                 @csrf
                                                 @method('delete')
                                                 <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                                            </form> 
                                       </div>
                                    </td>
                                @include('version.edit')    
                                </tr> 
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
        </div>
    </div>


@include('version.create')
      
@endsection
