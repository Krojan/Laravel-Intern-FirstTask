@props([
    'products',
    'tname',
])

@foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>

            @if(isset($product->slug))
                <td>{{$product->slug}}</td>
            @endif

            @if(isset($product->status))
                <td>{{$product->status}}</td>
            @endif

            @if(isset($product->price))
                <td>{{$product->price}}</td>
            @endif
            @if(isset($product->description))
                <td>{{$product->description}}</td>
            @endif
            @if($product->email)
                <td>{{$product->email}}</td>
            @endif

            @if(isset($product->image_name))
                <td>
                    <img src="{{asset('/images/'.$product->image_name)}}" alt="image" height="100px" width="100px">
                </td>
            @endif


            @if(isset($product->start_date) & isset($product->end_date))
            <td>
                <p>{{$product->start_date}} - {{$product->end_date}}</p>
            </td>
            @endif

            <td>
                <ul>
<!--                    --><?php //$segment1 =  Request::segment(1);  ?>
                    <li><a href="/{{$tname}}/edit/{{$product->id}}">Edit</a> </li>
                    <li><a href="/{{$tname}}/delete/{{$product->id}}">Delete</a> </li>
                </ul>
            </td>
        </tr>
    @endforeach


