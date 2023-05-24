<html>
   <head>
      <title>View orders Records</title>
   </head>
   
   <body>
      
      <table border = "1">
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Edit</td>
            <td>Operation</td>
         <td>Operation</td>
         </tr>
         @foreach ($orders as $order)
         <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td><a href = 'edit/{{ $order->id }}'>Edit</a></td>
         </tr>
         @endforeach
      </table>
   </body>
</html>