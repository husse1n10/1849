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

<h2>View Product</h2>


<ul>
    <li>Title: {{$product->title}}</li>
    <li>Description: {{$product->description}}</li>
    <li>price: {{$product->price}}</li>
    <li>Category Id: {{$product->category_id}}</li>
    <li>Category Name: {{$product->getCategory->name}}</li>
</ul>

<a href="{{route('listProducts')}}">Back to list</a>
</body>
</html>


