 <!-- Modal -->
 <div class="modal fade" id="edit{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Child Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
         <form action="{{route('child_tasks.update',$task->id)}}" method="post">
              @csrf
              @method('put')
                  {{-- <input type="hidden" name="parent_id" value="{{request()->task_id}}">
                  <div class="mb-3">
                      <label for="">Version</label>
                      <input type="text" class="form-control" name="version_id" value="{{$task->version->id}}">
                  </div> --}}
                  <div class="mb-3">
                      <label for="">Name</label>
                      <input type="text" name="name" class="form-control" value="{{$task->name}}" required>
                  </div>
                  <div class="mb-3">
                      <label for="">Status</label>
                      <select name="status" id="" class="form-control" required>
                              <option value="{{$task->status}}" hidden>{{$task->status == 1? 'To Do' :($task->status == 2 ? 'Progress': 'Done') }}</option>
                              <option value="1">To Do</option>
                              <option value="2">Progress</option>
                              <option value="3">Done</option>
                      </select>
                  </div> 
                  <div class="mb-3">
                      <label for="">Description</label>
                      <textarea name="description" rows="3" class="form-control">{{$task->description}}</textarea>
                  </div>
              </div>
              <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save changes</button>
                   </div>
          </form>
    </div>
    </div>
</div>