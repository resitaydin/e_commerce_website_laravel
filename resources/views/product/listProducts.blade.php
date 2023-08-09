<!DOCTYPE html>
<html lang="en">

<head>
    <title> Product List Page</title>
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
                    <th> id </th>
                    <th>Title </th>
                    <th>Category </th>
                    <th>Barcode </th>
                    <th>Status </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->productTitle }}</td>
                        @foreach ($categories as $category)
                            @if ($product->productCategoryId == $category->id)
                                <td> {{$category->categoryTitle}} </td>                       
                            @endif
                        @endforeach
                    @if ($product ->productCategoryId==null)
                        <td> </td>
                    @endif
                    
                    <td>{{ $product->barcode}}</td>
                    @if ($product->productStatus)
                        <td> Active </td>
                    @else
                        <td> Inactive </td>
                    @endif
                    <td><a href="{{ route('showEditProductPage', ['id' => $product->id]) }}">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete {{$product->productTitle}} category')"
                         href="{{route('deleteCategory',['id'=>$product->id])}} "> Delete </a></td>
                @endforeach
            </tbody>
        </table>
</body>
</html>