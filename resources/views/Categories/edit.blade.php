<h3>Add Category</h3>
<form action="{{route('category.update', $dataeditcategory->categorie_id)}}" method="POST">
    {{csrf_field()}}
    @method('PUT')
    <label>Nama:</label><br>
    <input type="text" name="name" value="{{$dataeditcategory->name}}" required>
    <br>
    <label>Deskripsi:</label><br>
    <textarea name="description">{{$dataeditcategory->description}}</textarea>
    <br>
    <button type="submit">Update</button>
</form>
