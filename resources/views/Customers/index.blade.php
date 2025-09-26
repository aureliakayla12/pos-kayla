<h3>Customers</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>
                <a href="{{route('customer.create')}}">+Create Customer</a>
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
            <td>
                <form action="{{route('customer.destroy', $v->customer_id)}}" method="POST" style="display: inline">
                {{csrf_field()}}
                @method('DELETE')
                <a href="{{route('customer.edit', $v->customer_id)}}">Edit</a>
                <button type="submit" onclick="return confirm('Are you sure want to delete this customer?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
