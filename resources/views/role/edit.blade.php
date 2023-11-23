@extends('master.app')
@section('title')
    edit role
@endsection

@section('content')
<div class="d-flex flex-row-reverse">
    <a href="{{route('role.index')}}" class="btn btn-sm btn-success my-3">back</a>
</div>

 {{-- validation error --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card mt-2">
    <div class="card-header">
        <h5>Add Role</h5>
    </div>
    <div class="card-body">
    <form action="{{url("role/$role->id")}}" method="post">
        @csrf
        @method('put')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <strong>Name</strong>
                        <input type="text" name="name" class="form-control" value="{{$role->name}}">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="checkAll" >
                        <span>Check all</span>
                    </div>
                </div>
                <div class="col-8">
                    <div class="d-flex flex-wrap">
                        @forelse ($permissions as $value)
                        <div class="p-1 d-flex">
                            <input type="checkbox" name="permission[]" value="{{$value->name}}" class="checkbox-item" id="id{{$value->id}}"
                           <?php if(in_array($value->id, $rolePermissions)){ ?>
                           checked
                          <?php } ?>
                            >   
                            <span class="ml-2">{{$value->name}}</span>
                        </div>
                    <br>   
                    @empty
                        <span class="text-muted d-block text-center">Need run PermissioTableSeeder</span>
                    @endforelse
                    </div>
                </div>
            </div>
        <input type="submit" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection