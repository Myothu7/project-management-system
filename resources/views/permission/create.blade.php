@extends('master.app')
@section('title')
    create role
@endsection
@section('content')
    <div class="d-flex flex-row-reverse">
        <a href="{{route('permissions.index')}}" class="btn btn-sm btn-success my-3">back</a>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            <h5>Add Permission</h5>
        </div>
        <div class="card-body">
        <form action="{{route('permissions.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <strong>Name</strong>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
        </div>
    </div>
@endsection