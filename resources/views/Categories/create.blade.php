@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add Category
            </div>
    <form action="{{route('category.store')}}" method="POST">
    {{csrf_field()}}

    <div class="card-body">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label><br>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
        @if ($errors->has('name'))
        <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label><br>
        <textarea name="description" class="form-control">{{old('description')}}</textarea>
        @if ($errors->has('description'))
        <span class="text-danger">{{$errors->first('description')}}</span>
        @endif
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <a href="{{route('category.index')}}" class="btn btn-success btn-sm">Back</a>
    </div>
    </div>
            </form>
        </div>
    </div>
</div>
@endsection
