<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>List Products   <a href="{{Route('addProduct')}}">Create</a> </h2>

<table>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{$row->title}}</td>
            <td>{{$row->getCategory->name}}</td>
            <td>
                <a href="{{route('viewProduct',['id'=>$row->id])}}">View</a>
                <a href="{{route('editProduct',['id'=>$row->id])}}">Edit</a>
                <a href="{{route('deleteProduct2',['id'=>$row->id])}}">Delete</a>

                <form action="{{route('deleteProduct',['id'=>$row->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete"/>
                </form>
            </td>
        </tr>
    @endforeach

</table>

</body>
</html>

