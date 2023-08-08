<!DOCTYPE html>
<html lang="en">

<head>
    <title> Category List Page</title>
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>Category List</h1>

        <table border="1">
            <thead>
                <tr>
                    <th> id </th>
                    <th>Category Title </th>
                    <th>Category Description </th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->categoryTitle }}</td>
                    <td>{{ $category->categoryDescription }}</td>
                    @if ($category->status)
                        <td> Active </td>
                    @else
                        <td> Inactive </td>
                    @endif
                    <td><a href="{{ route('showEditCategoryPage', ['id' => $category->id]) }}">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete {{$category->categoryTitle}} category')"
                         href="{{route('deleteCategory',['id'=>$category->id])}} "> Delete </a></td>
                @endforeach
            </tbody>
        </table>
</body>
</html>