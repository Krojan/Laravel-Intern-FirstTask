<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User profile</h1>
    <div>
        <p><span>Id:</span>{{$user->id}}</p>
    </div>
    <div>
        <p><span>Name:</span>{{$user->name}}</p>
    </div><div>
        <p><span>Email:</span>{{$user->email}}</p>
    </div>

</body>
<style>
    span{
        margin-right: 10px;

    }
    p{
        border: 1px solid black;
        width: 20%;
    }
</style>
</html>
