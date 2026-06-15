@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Customers
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>
                <a href="{{route('customer.create')}}" class="btn btn-primary btn-sm">+Create Customer</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->phone }}</td>
            <td>{{ $v->address }}</td>
            <td>{!! $v->is_member == 1 ?
            "<span class='badge bg-primary'>Member</span>" :
            "<span class='badge bg-danger'>Non-Member</span>" !!}
            </td>
            <td>
                <form action="{{route('customer.destroy', $v->customer_id)}}" method="POST" style="display: inline">
                {{csrf_field()}}
                @method('DELETE')
                <a href="{{route('customer.edit', $v->customer_id)}}" class="btn btn-success btn-sm">Edit</a>
                <button type="submit" onclick="return confirm('Are you sure want to delete this customer?')" class="btn btn-danger btn-sm">Delete</button>
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
