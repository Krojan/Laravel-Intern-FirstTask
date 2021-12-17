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
<h1>Product details</h1>
@if (Session::has('success'))
    <div class="success--msg">
        <strong>Success!</strong>{{session()->get('message')}}
    </div>
@endif
<table>
    <thead>
        <th>Name</th>
        <th>Category id</th>
        <th>Slug</th>
        <th>status</th>
        <th>Price</th>
        <th>Description</th>
        <th>product image</th>
        <th>Manage</th>
    </thead>
    <x-list :products="$products" :tname="$name"/>

</table>
</body>
</html>
