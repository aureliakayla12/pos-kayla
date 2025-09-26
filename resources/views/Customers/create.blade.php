<h3>Add Customers</h3>
<form action="{{route('customer.store')}}" method="POST">
    {{csrf_field()}}
    <label>Name:</label><br>
    <input type="text" name="name" value="{{old('name')}}">
    <br>
    @if ($errors->has('name'))
    <span>{{$errors->first('name')}}</span>
    @endif
    <br>
    <label>Phone:</label><br>
    <input type="number" name="phone" value="{{old('phone')}}">
    <br>
    @if ($errors->has('phone'))
    <span>{{$errors->first('phone')}}</span>
    @endif
    <br>
    <label>Address:</label><br>
    <textarea name="address">{{old('address')}}</textarea>
    <br>
    @if ($errors->has('address'))
    <span>{{$errors->first('address')}}</span>
    @endif
    <br>
    <button type="submit">Save</button>
</form>
