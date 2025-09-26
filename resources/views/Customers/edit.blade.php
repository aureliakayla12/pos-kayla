<h3>Add Category</h3>
<form action="{{route('customer.update', $dataeditcustomer->customer_id)}}" method="POST">
    {{csrf_field()}}
    @method('PUT')
    <label>Name:</label><br>
    <input type="text" name="name" value="{{$dataeditcustomer->name}}" required>
    <br>
    <label>Phone:</label><br>
    <input type="number" name="phone" value="{{$dataeditcustomer->phone}}" required>
    <br>
    <label>Address:</label><br>
    <textarea name="address">{{$dataeditcustomer->address}}</textarea>
    <br>
    <button type="submit">Update</button>
</form>
