@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Edit Category
            </div>
<form action="{{route('products.update', $dataeditproduct->product_id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('PUT')

    <div class="card-body">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label><br>
            <input type="text" class="form-control" name="name" value="{{ old('name', $dataeditproduct->name ?? '')}}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label><br>
            <textarea name="description" class="form-control">{{ old('description', $dataeditproduct->description ?? '')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label><br>
            <input type="number" class="form-control" name="price" value="{{ old('price', $dataeditproduct->price ?? '')}}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label><br>
            <input type="number" class="form-control" name="stock" value="{{ old('stock', $dataeditproduct->stock ?? '')}}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label><br>
            <select name="categorie_id" class="form-control">
            <option value="">-- Choose Category --</option>
            @foreach ($categories as $category)
            <option value="{{ $category->categorie_id }}" {{$dataeditproduct->categorie_id == $category->categorie_id ? 'selected' : '' }}>
            {{ $category->name }}
            </option>
            @endforeach
            </select>
            </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label><br>
            <select name="status" class="form-control">
            <option value="available" {{ old('status', $product->status ?? '') == 'available' ? 'selected' : '' }}>Available</option>
            <option value="unavailable" {{ old('status', $product->status ?? '') == 'unavailable' ? 'selected' : ''}}>Unavailable</option>
        </select>
        <br>
        <label for="image" class="form-label">Image</label><br>
        <input type="file" name="image">
        @if (!empty($product->image))
        <p class="mt-2"><img src="{{ asset('storage/'.$product->image) }}" width="150"></p>
        @endif
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="{{route('products.index')}}" class="btn btn-success btn-sm">Back</a>
    </div>
        </div>
            </form>
        </div>
    </div>
</div>
@endsection
