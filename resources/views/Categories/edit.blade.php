@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Edit Category
            </div>
    <form action="{{route('category.update', $dataeditcategory->categorie_id)}}" method="POST">
    {{csrf_field()}}
    @method('PUT')

    <div class="card-body">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label><br>
        <input type="text" class="form-control" name="name" value="{{$dataeditcategory->name}}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label><br>
        <textarea name="description" class="form-control">{{$dataeditcategory->description}}</textarea>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="{{route('category.index')}}" class="btn btn-success btn-sm">Back</a>
    </div>
    </div>
            </form>
        </div>
    </div>
</div>
@endsection
