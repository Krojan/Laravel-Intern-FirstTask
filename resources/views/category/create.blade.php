<!DOCTYPE html>
<body>
<h1>Create category</h1>
<form action="{{route('category_store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name
        </label>
        <input id="name" name="name" type="text" required>
    </div>

    <div >
        <label for="slug">Slug
        </label>
        <input id="slug" name="slug" type="text" required>
    </div>

    <div >
        <label for="status">Status
        </label>
        <input id="status" name="status" type="checkbox">
    </div>

    <div>
        <label for="image">Image
        </label>
        <input type="file" id="image" name="image"  accept="image/*"  required/>
    </div>


    <div>
        <button type="submit" value="Submit">Submit</button>
    </div>

</form>
</body>
</html>
