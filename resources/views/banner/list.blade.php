<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/list_style.css')}}">
</head>
<body>
<h1>Banner details</h1>
@if (Session::has('success'))
    <div class="success--msg">
        <strong>Success!</strong> {{session()->get('success')}}
    </div>
@endif
<table>
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>image</th>
        <th>Start date-end date</th>
        <th>Manage</th>
    </thead>
    <x-list :products="$banners" :tname="$name"/>

</table>
</body>
</html>
