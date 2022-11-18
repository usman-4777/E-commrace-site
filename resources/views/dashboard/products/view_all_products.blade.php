
    <div class="container">
        <h2>view all products</h2>
        <a href="{{route('products.create')}}">Add new product</a>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Discount</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->discount}}</td>
                    <td>{{$product->Image}}</td>
                    <td><img src="{{ asset('storage') . '/' . $product->image }}" height="100px" width="100px"
                             alt="swift car"></td>

                    <td>
                        <a href="{{route('products.edit', [$product->id])}}">Edit</a>
                        <a href="{{route('delete_product', [$product->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{url('/website')}}" >website</a>

    </div>

