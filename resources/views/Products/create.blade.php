<h3>Add Products</h3>
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <label>Name:</label><br>
    <input type="text" name="name">
    <br>
    <label>Description</label><br>
    <textarea name="description"></textarea>
    <br>
    <label>Price</label><br>
    <input type="number" name="price">
    <br>
    <label>Stock</label><br>
    <input type="number" name="stock">
    <br>
    <label>Category</label><br>
    <select name="categorie_id">
        <option value="">-- Choose Category --</option>
        @foreach ($categories as $category)
        <option value="{{ $category->categorie_id }}">
            {{ $category->name }}
        </option>
        @endforeach
    </select>
    <br>
    <label>Status</label><br>
    <select name="status">
        <option value="available" selected>Available</option>
        <option value="unavailable">Unavailable</option>
    </select>
    <br>
    <label>Image</label><br>
    <input type="file" name="image">
    <br>
    <br>
    <button type="submit">Save</button>
</form>
