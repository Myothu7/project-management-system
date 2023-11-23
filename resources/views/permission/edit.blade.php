@extends('master.app')
@section('title')
    update role
@endsection
@section('content')
    <div class="d-flex flex-row-reverse">
        <a href="{{route('permissions.index')}}" class="btn btn-sm btn-success my-3"><i class="bi bi-chevron-left"></i>back</a>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            <h5>Update Permission</h5>
        </div>
        <div class="card-body">
        <form action="{{route('permissions.update',$permission->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <strong>Name</strong>
                        <input type="text" name="name" class="form-control" required value="{{$permission->name}}">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
        </div>
    </div>
@endsection