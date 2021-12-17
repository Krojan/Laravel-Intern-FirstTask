<!DOCTYPE html>
<body>
<h1>Edit form</h1>

<form action="/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Product Name
        </label>
        <input id="name" name="name" type="text" value="{{$product->name}}"required>
    </div>

    <div >
        <label for="slug">Product slug
        </label>
        <input id="slug" name="slug" type="text" value="{{$product->slug}}" required>
    </div>

    <div >
        <label for="status">Product status
        </label>
        <input id="status" name="status" type="checkbox"
                @if($product->status)
                    checked
                @endif>
    </div>

    <div >
        <label for="price">Price
        </label>
        <input id="price" name="price" type="number" value="{{$product->price}}" required>
    </div>

    <div>
        <label for="image">Upload new image
        </label>
        <div>
            Old image preview
            <img src="{{asset('product_images/'.$product->product_image)}}" height="50px">
        </div>
        <input type="file" id="image" name="image"  accept="image/*">
    </div>

    <div >
        <label for="description">Product description
        </label>
        <input id="description" name="description" type="text"  value="{{$product->description}}"required>
    </div>

    <div>
        <button type="submit" value="submit">Update</button>
    </div>


</form>
</body>
</html>
