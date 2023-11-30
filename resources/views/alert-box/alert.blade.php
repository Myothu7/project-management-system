     {{-- upload success alert --}}
<div class="col-12 d-flex flex-row-reverse">  
    @if(session("upload-success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('upload-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

     {{-- update success alert --}}
<div class="col-12 d-flex flex-row-reverse">
    @if(session("update-success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('update-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

    {{-- delete success alert --}}
<div class="col-12 d-flex flex-row-reverse"> 
    @if(session("delete-success"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete-success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

    {{-- department delete success alert --}}
<div class="col-12 d-flex flex-row-reverse"> 
    @if(session("no-delete"))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('no-delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

    {{-- version number exist --}}
<div class="col-12 d-flex flex-row-reverse"> 
    @if(session("version_number"))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('version_number')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
   