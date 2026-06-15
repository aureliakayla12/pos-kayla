@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Products
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Image</th>
            <th>
                <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">+Create Products</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->categories->name ?? '-' }}</td>
            <td>{{ number_format($v->price, 0, ',', ',') }}</td>
            <td>{{ $v->stock }}</td>
            <td>
                <span class="badge bg-{{$v->status == 'available' ? 'success' : 'secondary'}}">
                    {{ ucfirst($v->status) }}
            </td>
            <td>
                @if ($v->image)
                <img src="{{ asset('storage/'.$v->image) }}" width="150">
                @else
                -
                @endif
            </td>
            <td>
                <form action="{{route('products.destroy', $v->product_id)}}" method="POST" style="display: inline">
                {{csrf_field()}}
                @method('DELETE')
                <a href="{{route('products.edit', $v->product_id)}}" class="btn btn-success btn-sm">Edit</a>
                <button type="submit" onclick="return confirm('Are you sure want to delete this product?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection


