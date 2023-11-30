@extends('master.app')
@section('title')
     taks
@endsection
@section('content')
     <div class="col-12">
          <div class="d-flex justify-content-between align-items-center my-3">
               <a href="{{url("version?project_id=".request()->has('project_id'))}}" class="btn btn-sm btn-primary"><i class="bi bi-chevron-left"></i>back</a>    
          @can('user-create')
               <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus"></i>Add New</a>
          @endcan   
          </div>
          @include('alert-box.alert')
     </div>
    <div class="card">
          <div class="card-header">
               <h5>All Tasks( {{$project_name->name}} )</h5>
          </div>
          <div class="card-body">
              <table class="table table-sm">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>PICs</th>
                              <th>Status</th>
                              <th>Description</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @forelse ($tasks as $task)
                         <tr>
                             <td>{{$task->id}}</td>
                             <td>
                                   {{$task->name}}
                                   <span data-toggle="collapse" data-target="#{{$task->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="bi bi-chevron-expand"></i>
                                   </span>
                                   <div id="{{$task->id}}" class="collapse" data-parent="#accordion">
                                        @foreach ($child_tasks as $val)
                                             @if ($val->parent_id == $task->id)
                                                  <li class="text-success">{{$val->name}}</li>    
                                             @endif
                                        @endforeach
                                   </div>
                              </td>
                              <td>
                                   @foreach ($child_tasks->unique('user_id') as $val)
                                        @if ($val->parent_id == $task->id)
                                             <li class="text-success">
                                                  {{$val->user_name}}
                                             </li>    
                                        @endif
                                   @endforeach
                              </td>
                              <td> <span class="badge {{$task->status == 1?'badge-warning' :($task->status == 2 ? 'badge-primary':'badge-success') }}">
                                   {{$task->status == 1? 'To Do' :($task->status == 2 ? 'Progress': 'Done')}}
                              </span></td>
                             {{-- <td>
                                   <span class="badge {{$flag?'badge-success':($task->status == 1?'badge-warning' :($task->status == 2 ? 'badge-primary':'badge-success')) }}">
                                        @if ($val->parent_id == $task->id)
                                             {{ $flag?'Done':($task->status == 1? 'To Do' :($task->status == 2 ? 'Progress': 'Done')) }}    
                                        @else
                                            {{$task->status == 1? 'To Do' :($task->status == 2 ? 'Progress': 'Done')}}
                                        @endif
                                   </span>
                              </td> --}}
                             <td>{{$task->description}}</td>
                             <td>
                              <div class="btn-group" >
                              <a href="{{url('child_tasks?task_id='.$task->id.'&'.'version_id='.request()->version_id.'&'.'project_id='.request()->project_id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-list-task text-dark"></i></i></a>    
                              <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#edit{{$task->id}}"><i class="bi bi-pencil-square text-success"></i></a>
                              <form action="{{route('tasks.destroy',$task->id)}}" method="post" class="btn btn-sm btn-outline-primary">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="border-0 p-0" style="background-color: transparent;"><i class="bi bi-trash text-danger"></i></button>
                              </form> 
                         </div>
                         </td>
                         @include('tasks.edit')
                         @empty
                             <td>empty data</td>
                         </tr>     
                         @endforelse
                    
                    </tbody>
              </table>
          </div>
    </div>
  
    @include('tasks.create')
@endsection