<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/list_style.css')}}"></head>
<body>

@if ($message = session('success'))
    <div class="success--msg">
        <strong>Success!</strong> {{$message}}
    </div>
@endif
<div>

    <h1>Manage user</h1>
    <ul>
            <li>
                @guest
                    <a href="/register">Add New user</a>
                @endguest

                @auth
                        <a href="/logout">Logout</a>
                    @endauth
            </li>

        <li>
            <a href="/user/list">List user</a>
        </li>
        <li>
            <a href="/user/profile">User profile</a>
        </li>
    </ul>
</div>

<div>
    <h1>Manage product</h1>
    <ul>
        <li>
            <a href="{{route('product_create')}}">Add new product</a>
        </li>
        <li>
            <a href="{{route('product_list')}}">List product</a>
        </li>


    </ul>
</div>

<div>
    <h1>Manage category</h1>
    <ul>
        <li>
            <a href="{{route('category_create')}}">Add new category</a>
        </li><li>
            <a href="{{route('category_list')}}">List category</a>
        </li>

    </ul>
</div>
<div>
    <h1>Manage banner</h1>
    <ul>
        <li>
            <a href="{{route('banner_create')}}">Add new banner</a>
        </li>
        <li>
            <a href="{{route('banner_list')}}">List banners</a>
        </li>

    </ul>
</div>


</body>
</html>
