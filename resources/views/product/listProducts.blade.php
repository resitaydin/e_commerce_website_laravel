<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List Page</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Product List</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Barcode</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->productTitle }}</td>
                    <td>
                        @foreach ($categories as $category)
                            @if ($product->productCategoryId == $category->id)
                                {{ $category->categoryTitle }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->productStatus ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('showEditProductPage', ['id' => $product->id]) }}">Edit</a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete {{ $product->productTitle }} category')"
                           href="{{ route('deleteProduct', ['id' => $product->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
