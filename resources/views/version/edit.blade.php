  <!-- Modal -->
  <div class="modal fade" id="edit{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Version</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{route('version.update',$v->id)}}" method="post">
                @csrf
                @method('put')
            <input type="hidden" value="{{$project->id}}" name="project_id">   
            <div class="mb-3">
                <label for="">version number</label>
                <input type="text" class="form-control"  name="version_number" value="{{$v->version_number}}" required>
            </div>  
            <div>
                <label for="">Remark</label>
                <input type="text" class="form-control"  name="remark" value="{{$v->remark}}" required>
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
{{-- end modal --}}