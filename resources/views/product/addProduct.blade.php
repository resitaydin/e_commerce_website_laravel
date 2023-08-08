<!DOCTYPE html>
<html>
<head>
    <title> Add Product Page </title>
</head>

<body>
<div class="container">
    <h2> Add Product </h2>

    @if($errors)
        <p> {{$errors->first()}}</p>
    @endif
    
    <form method="POST" action="{{ route('addProduct') }}">
        @csrf 
        <table class="add-product-form">
            <tr>
                <td><label for="productTitle"> Product Title</label></td>
                <td><input type="text" name="productTitle" class="form-control" ></td>
            </tr>
            <tr>
                <label for="productCategoryId"> Product Category </label>
                <select name="productCategoryId" id="productCategoryId">
                    <option value={{null}}> </option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->id}} - {{$category->categoryTitle}} </option>
                    @endforeach
                </select>
            </tr>
            <tr>
                <td><label for="barcode"> Product Barcode </label></td>
                <td><input type="text" name="barcode" class="form-control" ></td>
            </tr>
            <tr>
                <td><label for="status"> Status </label></td>
                <td><input type="radio" id="html" name="productStatus" value="1">
                    <label for="html"> Active </label>
                    <input type="radio" id="css" name="productStatus" value="0">
                    <label for="css"> Inactive </label></td>
            </tr>
        </table>
        <input type="submit" value="Save" name="saveAddProductForm">
    </form>
</div>
</body>
</html>
