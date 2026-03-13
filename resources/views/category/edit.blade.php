<!DOCTYPE html>
<html>
<style>
    form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    label {display: block;}

    input, textarea, select {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<body>

<h2>Create Category</h2>

<form method="post" action="{{route('category.update',['category'=>$category->id])}}">
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input value="{{$category->name}}" required type="text" id="name" name="name" placeholder="Category Name">

    <input type="submit" value="Submit">
 <a href="{{Route('category.index')}}">Back</a>
</form>

</body>
</html>


