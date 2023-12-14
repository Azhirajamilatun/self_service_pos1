<html>
    <title>Edit Product</title>
    <body>
        <h2>Edit Product</h2>
        <hr>
        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        @endif
      <form action="{{ URL ('product') }}/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf  
        @method('PUT')
        <table>
               <tr>
                    <th>Product</th>
                    <td>
                        <input type="text" name="product" value="{{ $product->product }}" required>
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>
                        <input type="number" name="price" value="{{ $product->price }}"required>
                    </td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td>
                        <input type="number" name="stock" value="{{ $product->stock }}"required>
                    </td>
                </tr>
        </table>
        <button type="submit">Save</button>
      </form>  
    </body>
</html>