@extends('master.app')
@section('title')
     child taks
@endsection
@section('content')
{{-- .request()->has('project_id').'&version_id='.$task->version->id --}}
     <div class="col-12">
          <div class="d-flex justify-content-between align-items-center my-3">
               <a href="{{url("tasks?version_id=".$task->version->id.'&'.'project_id='.request()->project_id)}}" class="btn btn-sm btn-primary">
                    <i class="bi bi-chevron-left"></i>back
               </a>    
          @can('user-create')
               <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus"></i>Add New</a>
          @endcan   
          </div>
          @include('alert-box.alert')
     </div>
    <div class="card">
          <div class="card-header">
               <h5>{{$task->name}}</h5> 
               <h6 class="text-primary">All Child Tasks</h6>
               {{-- <h5>All Child Tasks ( {{$task->name}} ) </h5> --}}
          </div>
          <div class="card-body">
              <table class="table table-sm">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Developer</th>
                              <th>Status</th>
                              <th>Description</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @forelse ($child_tasks as $task)
                         <tr>
                             <td>{{$task->id}}</td>
                             <td>{{$task->name}} </td>
                             @foreach ($developers as $dev)
                                   @if ($dev->user_id == $task->user_id)
                                        <td>{{$dev->name}}</td>
                                   @endif
                             @endforeach
                             <td><span class="badge {{$task->status == 1?'badge-warning' :($task->status == 2 ? 'badge-primary':'badge-success') }}">
                                   {{$task->status == 1? 'To Do' :($task->status == 2 ? 'Progress': 'Done') }}
                              </span></td>
                             <td>{{$task->description}}</td>
                             <td>
                              <div class="btn-group" >   
                              <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#edit{{$task->id}}"><i class="bi bi-pencil-square text-success"></i></a>
                              <form action="{{route('child_tasks.destroy',$task->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                              </form> 
                         </div>
                         </td>
                         @include('child_task.edit')
                         @empty
                             <td>empty data</td>
                         </tr>     
                         @endforelse
                    
                    </tbody>
              </table>
          </div>
    </div>
  
@include('child_task.create')    
@endsection