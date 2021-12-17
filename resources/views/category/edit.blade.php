<!DOCTYPE html>
<body>
<h1>Edit form</h1>

<form action="/category/update/{{$category->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Category Name
        </label>
        <input id="name" name="name" type="text" value="{{$category->name}}"required>
    </div>

    <div >
        <label for="slug">Category slug
        </label>
        <input id="slug" name="slug" type="text" value="{{$category->slug}}" required>
    </div>

    <div >
        <label for="status">Category status
        </label>
        <input id="status" name="status" type="checkbox"
               @if($category->status)
               checked
            @endif>
    </div>


    <div>
        <label for="image">Upload new image
        </label>
        <div>
            Old image preview
            <img src="{{asset('images/'.$category->image_name)}}" height="50px">
        </div>
        <input type="file" id="image" name="image"  accept="image/*">
    </div>


    <div>
        <button type="submit" value="submit">Update</button>
    </div>


</form>
</body>
</html>

