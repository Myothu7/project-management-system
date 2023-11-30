  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
         <form action="{{route('tasks.store')}}" method="post">
              @csrf
                  <div class="mb-3">
                      <label for="">Version</label>
                      <input type="hidden" name="version_id" value="{{$version->id}}">
                      <input type="text" class="form-control" value="v-{{$version->version_number}}" readonly>
                  </div>
                  <div class="mb-3">
                      <label for="">Name</label>
                      <input type="text" name="name" class="form-control" required>
                  </div>
                  <input type="hidden" value="1" name="status">
                  {{-- <div class="mb-3">
                      <label for="">Status</label>
                      <select name="status" id="" class="form-control" required>
                              <option value="" hidden>--select option--</option>
                              <option value="1">To Do</option>
                              <option value="2">Progress</option>
                              <option value="3">Done</option>
                      </select>
                  </div>  --}}
                  <div class="mb-3">
                      <label for="">Description</label>
                      <textarea name="description" rows="3" class="form-control"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save</button>
                   </div>
          </form>
    </div>
    </div>
</div>