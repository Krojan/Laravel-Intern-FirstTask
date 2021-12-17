<!DOCTYPE html>
<body>
    <h1>Product details</h1>
    <form action="{{route('product_store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Product Name
            </label>
            <input id="name" name="name" type="text" required>
        </div>

        <div >
            <label for="slug">Product slug
            </label>
            <input id="slug" name="slug" type="text" required>
        </div>

        <div >
            <label for="status">Product status
            </label>
            <input id="status" name="status" type="checkbox">
        </div>

        <div >
            <label for="price">Price
            </label>
            <input id="price" name="price" type="number" required>
        </div>

        <div>
            <label for="image">Image
            </label>
            <input type="file" id="image" name="image"  accept="image/*" />
        </div>

        <div >
            <label for="description">Product description
            </label>
            <input id="description" name="description" type="text" required>
        </div>

        <div>
            <button type="submit" value="Submit">Submit</button>
        </div>


    </form>
</body>
</html>
