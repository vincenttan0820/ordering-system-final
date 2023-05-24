<h1>User Page</h1>
<html>
    <style>
        .w-5{
            display: none
        }
        </style>
<table border="1">
    <tr>
        <td>Name</td>
        <td>Description</td>
        <td>Price(RM)</td>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->item_name }}</td>
        <td>{{ $item->item_description }}</td>
        <td>{{ $item->item_price }}</td>
    </tr>
    @endforeach
</table>


</html>