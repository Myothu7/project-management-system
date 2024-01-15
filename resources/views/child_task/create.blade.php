  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Child Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
         <form action="{{route('child_tasks.store')}}" method="post">
              @csrf
                  <input type="hidden" name="parent_id" value="{{request()->task_id}}">
                  <div class="mb-3">
                      {{-- <label for="">Version</label> --}}
                      <input type="hidden" class="form-control" name="version_id" value="{{$task->version->id}}">
                  </div>
                  <div class="mb-3">
                      <label for="">Name</label>
                      <input type="text" name="name" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="">Developer</label>
                    <select name="user_id" id="" class="form-control">
                        <option value="" hidden>--choice PICs--</option>
                        @forelse ($developers as $dev)
                            <option value="{{$dev->user_id}}">{{$dev->name}}</option>
                            @empty
                            <option value="" selected>no developer</option>
                        @endforelse
                    </select>
                  </div>
                  <div class="mb-3">
                      <label for="">Status</label>
                      <select name="status" id="" class="form-control" required>
                              <option value="" hidden>--select option--</option>
                              <option value="1">To Do</option>
                              <option value="2">Progress</option>
                              {{-- <option value="3">Done</option> --}}
                      </select>
                  </div> 
                  <div class="mb-3">
                      <label for="">Description</label>
                      <textarea name="description" rows="3" class="form-control"></textarea>
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