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

<h2>Create Product</h2>

<form method="post" action="{{route('saveProduct')}}">
    @csrf
    <label for="title">Title</label>
    <input  type="text" id="title" name="body_title" placeholder="Product Title">
    @error('body_title')
    <span style="color:red">{{$message}}</span>
    @enderror

    <label for="description">Description</label>
    <textarea  id="description" name="body_description" placeholder="Product Description"></textarea>
    @error('body_description')
    <span style="color:red">{{$message}}</span>
    @enderror

    <label for="price">Price</label>
    <input  type="number" id="price" name="body_price" placeholder="Product Price">
    @error('body_price')
    <span style="color:red">{{$message}}</span>
    @enderror


    <label for="price2">Confirm Price</label>
    <input  type="number" id="price2" name="body_price_confirmation" placeholder="Confirm Price">


    <label for="category">Category</label>
    <select  id="category" name="body_category">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    @error('body_category')
    <span style="color:red">{{$message}}</span>
    @enderror

    <input type="submit" value="Submit">
 <a href="{{Route('listProducts')}}">Back</a>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</body>
</html>


