<!DOCTYPE html>
<body>
<h1>Banner details</h1>
<form action="{{route('banner_store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name
        </label>
        <input id="name" name="name" type="text" required>
    </div>

    <div>
        <label for="url">Banner url
        </label>
        <input id="url" name="url" type="text" required>
    </div>

    <div>
        <label for="start">Bstart-date
        </label>
        <input type="datetime-local" id="start" name="start_date" value="{{ date('Y-m-d H:i:s')}}">
    </div>
     <div>
            <label for="end">BEnd-date
            </label>
            <input type="datetime-local" id="end" name="end_date" value="{{ date('Y-m-d H:i:s') }}">
       </div>

    <div>
        <label for="image">Image
        </label>
        <input type="file" id="image" name="image" accept="image/*"/>
    </div>


    <div>
        <button type="submit" value="Submit">Submit</button>
    </div>


</form>
</body>
</html>
