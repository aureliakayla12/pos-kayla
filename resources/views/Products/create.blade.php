@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add Products
            </div>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
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
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label><br>
        <input type="number" class="form-control" name="price" value="{{old('price')}}">
        @if ($errors->has('price'))
        <span class="text-danger">{{$errors->first('price')}}</span>
        @endif
    </div>

    <div class="mb-3">
    <label for="stock" class="form-label">Stock</label><br>
    <input type="number" class="form-control" name="stock" value="{{old('stock')}}">
    @if ($errors->has('stock'))
    <span class="text-danger">{{$errors->first('stock')}}</span>
    @endif
    </div>

    <div class="mb-3">
    <label for="category" class="form-label">Category</label><br>
    <select name="categorie_id" class="form-control">
        <option value="">-- Choose Category --</option>
        @foreach ($categories as $category)
        <option value="{{ $category->categorie_id }}">
            {{ $category->name }}
        </option>
        @endforeach
    </select>
        @if ($errors->has('categorie_id'))
        <span class="text-danger">{{$errors->first('categorie_id')}}</span>
        @endif
    </div>

    <div class="mb-3">
    <label for="status" class="form-label">Status</label><br>
    <select name="status" class="form-control">
        <option value="available" selected>Available</option>
        <option value="unavailable">Unavailable</option>
    </select>
    </div>

    <div class="mb-3">
    <label for="image" class="form-label">Image</label><br>
    <input type="file" name="image">
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <a href="{{route('products.index')}}" class="btn btn-success btn-sm">Back</a>
    </div>
    </div>
            </form>
        </div>
    </div>
</div>
@endsection
