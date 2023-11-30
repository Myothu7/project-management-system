 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Version</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('version.store')}}" method="post">
                        @csrf
                     <input type="hidden" value="{{$project->id}}" name="project_id">   
                     <div class="mb-3">
                        <label for="">version number</label>
                        <input type="text" class="form-control"  name="version_number" required>
                    </div> 
                    <div class="mb-3">
                        <label for="">Departments</label>
                        <select name="department_id[]" id="" multiple class="form-control">
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="">Remark</label>
                        <input type="text" class="form-control"  name="remark">
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