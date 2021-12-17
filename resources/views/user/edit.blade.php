<!DOCTYPE html>
<body>
<h1>Edit form</h1>

<form action="/user/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name
        </label>
        <input id="name" name="name" type="text" value="{{$user->name}}"required>
    </div>

    <div >
        <label for="email">Email
        </label>
        <input id="email" name="email" type="email" value="{{$user->email}}" required>
    </div>


    <div >
        <label for="password"> password
        </label>
        <input id="password" name="password" type="password"  value="{{$user->password}}"required>
    </div>

    <div>
        <button type="submit" value="submit">Update</button>
    </div>

</form>
</body>
</html>

