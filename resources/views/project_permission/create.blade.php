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
         <form action="{{route('project_permission.store')}}" method="post">
              @csrf
                  <div class="mb-3">
                      <label for="">Projects</label>
                      <select name="project_id[]" id="" class="form-control" multiple required>
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                      </select>
                  </div>
                  {{-- <div class="mb-3">
                        <label for="">Choice Department For Employee</label>
                        <form action="">
                            <select name="department" id="" required class="form-control">
                                <option value="" hidden>--choice department--</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach    
                            </select>
                        </form>
                  </div> --}}
                  <div class="mb-3">
                      <label for="">Employee Permission</label>
                      <select name="user_id" id="" class="form-control" required>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                      </select>
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