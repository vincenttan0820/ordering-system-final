<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
      <table border = "1">
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Edit</td>
         </tr>
         @foreach ($orders as $order)
         <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td><a href = 'delete/{{ $order->id }}'>Delete</a></td>
         </tr>
         @endforeach
      </table>
   </body>
</html>