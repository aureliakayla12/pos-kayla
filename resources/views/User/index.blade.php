@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Tampil data user
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>
                <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">+Create User</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $v )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->role }}</td>
            <td>
                <form action="{{route('user.destroy', $v->user_id)}}" method="POST" style="display: inline">
                {{csrf_field()}}
                @method('DELETE')
                <a href="{{route('user.edit', $v->user_id)}}" class="btn btn-success btn-sm">Edit</a>
                <button type="submit" onclick="return confirm('Are you sure want to delete this user?')"  class="btn btn-danger btn-sm">Delete</button>
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
