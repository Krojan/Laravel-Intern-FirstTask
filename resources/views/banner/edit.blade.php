<!DOCTYPE html>
<body>
<h1>Edit form</h1>

<form action="/banner/update/{{$banner->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Banner Name
        </label>
        <input id="name" name="name" type="text" value="{{$banner->name}}"required>
    </div>

    <div >
        <label for="url">Banner url
        </label>
        <input id="url" name="url" type="text" value="{{$banner->url}}" required>
    </div>

    <div>
        <label for="start">Bstart-date
        </label>
        <input type="datetime-local" id="start" name="start_date" value="{{$start_date}}">
    </div>
    <div>
        <label for="end">BEnd-date
        </label>
        <input type="datetime-local" id="end" name="end_date" value="{{ $end_date }}">
    </div>


    <div>
        <label for="image">Upload new image
        </label>
        <div>
            Old image preview
            <img src="{{asset('images/'.$banner->image_name)}}" height="50px">
        </div>
        <input type="file" id="image" name="image"  accept="image/*">
    </div>


    <div>
        <button type="submit" value="submit">Update</button>
    </div>


</form>
</body>
</html>


