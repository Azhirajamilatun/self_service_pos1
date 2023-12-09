<html>
    <title>create product</title>
    <body>
        <h2>create product</h2>
        <hr>
        <form action="{{ URL('product') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <table>
                <tr>
                    <th>product</th>
                    <td>
                        <input type="text" name="product" required>
                    </td>
                </tr>

                <tr>
                    <th>price</th>
                    <td>
                        <input type="number" name="price" required>
                    </td>
                </tr>

                <tr>
                    <th>stock</th>
                    <td>
                        <input type="text" name="stock" required>
                    </td>
                </tr>
                 </table>
                 <button type="submit">save</button>
            </form>
        </body>
    </html>