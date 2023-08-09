<!DOCTYPE html>
<html>
<head>
    <title> Edit Product Page </title>
</head>

<body>
<div class="container">
    <h2> Edit Product </h2>

    @if($errors)
        <p> {{$errors->first()}}</p>
    @endif
    
    <form method="POST" action="{{ route('editProduct', ['id' => $product->id]) }}">
        @csrf 
        @method ('PUT')
        <table class="edit-product-form">
            <tr>
                <td><label for="productTitle"> Category Title</label></td>
                <td><input type="text" name="productTitle" value="{{$product->productTitle}}" class="form-control" ></td>
            </tr>
            <tr>
                <label for="productCategoryId"> Product Category </label>
                <select name="productCategoryId" id="productCategoryId">
                    <option value={{null}}> </option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->productCategoryId ? 'selected' : '' }}>
                        {{ $category->id }} - {{ $category->categoryTitle }}
                    </option>
                    @endforeach
                </select>
            </tr>
            <tr>
                <td><label for="barcode"> Product Barcode </label></td>
                <td><input type="text" name="barcode" class="form-control"  value="{{$product->barcode}}"></td>
            </tr>
            <tr>
                <td><label for="status"> Status </label></td>
                <td><input type="radio" id="html" name="productStatus" value="1" {{ $category->status ? 'checked' : '' }}>
                    <label for="html"> Active </label>
                    <input type="radio" id="css" name="productStatus" value="0" {{ $category->status  ? '' : 'checked' }}>
                    <label for="css"> Inactive </label></td>
            </tr>
        </table>
        <input type="submit" value="Save" name="saveEditProductForm">
    </form>
</div>
</body>
</html>