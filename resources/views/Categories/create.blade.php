<h3>Add Category</h3>
<form action="{{route('category.store')}}" method="POST">
    {{csrf_field()}}
    <label>Nama:</label><br>
    <input type="text" name="name">
    <br>
    @if ($errors->has('name'))
    <span class="text-danger">{{$errors->first('name')}}</span>
    @endif
    <br>
    <label>Deskripsi:</label><br>
    <textarea name="description">{{old('description')}}</textarea>
    <br>
    <button type="submit">Save</button>
</form>
