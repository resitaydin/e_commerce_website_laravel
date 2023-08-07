<!DOCTYPE html>
<html>
<head>
    <title> Add User Page </title>
</head>

<body>
<div class="container">
    <h2>Add User</h2>

    @if($errors)
        <p> {{$errors->first()}}</p>
    @endif
    
    <form method="POST" action="{{ route('addCategory') }}">
        @csrf 
        <table class="add-category-form">
            <tr>
                <td><label for="categoryTitle"> Category Title</label></td>
                <td><input type="text" name="categoryTitle" class="form-control" ></td>
            </tr>
            <tr>
                <td><label for="categoryDescription"> Category Description</label></td>
                <td><input type="text" name="categoryDescription" class="form-control" ></td>
            </tr>
            <tr>
                <td><label for="status"> Status </label></td>
                <td><input type="radio" id="html" name="status" value="1">
                    <label for="html"> Active </label>
                    <input type="radio" id="css" name="status" value="0">
                    <label for="css"> Inactive </label></td>
            </tr>
        </table>
        <input type="submit" value="Save" name="saveAddCategoryForm">
    </form>
</div>
</body>
</html>
