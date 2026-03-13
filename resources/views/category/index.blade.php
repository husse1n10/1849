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

<h2>List Category   <a href="{{Route('category.create')}}">Create</a> </h2>

<table>
    <tr>
        <th>Name</th>
        <th># Products</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{$row->name}}</td>
            <td>{{count($row->getProducts)}}</td>
            <td>
                <a href="{{route('category.show',['category'=>$row->id])}}">View</a>
                <a href="{{route('category.edit',['category'=>$row->id])}}">edit</a>
                <a href="{{route('category.delete',['category'=>$row->id])}}">delete</a>

                <form action="{{route('category.destroy',['category'=>$row->id])}}" method="post">
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

