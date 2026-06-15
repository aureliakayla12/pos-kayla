@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Categories
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
            <th>Description</th>
            <th>
                <a href="{{route('category.create')}}" class="btn btn-primary btn-sm">+Create Category</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->description }}</td>
            <td>
                <form action="{{route('category.destroy', $v->categorie_id)}}" method="POST" style="display: inline">
                {{csrf_field()}}
                @method('DELETE')
                <a href="{{route('category.edit', $v->categorie_id)}}" class="btn btn-success btn-sm">Edit</a>
                <button type="submit" onclick="return confirm('Are you sure want to delete this category?')" class="btn btn-danger btn-sm">Delete</button>
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
