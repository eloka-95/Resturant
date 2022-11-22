
    <x-app-layout>

        <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
        @include("Admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
       @include('Admin.nav')
      
       <div>
        <table style="background-color: black;">
            <tr>
            <th style="padding: 20px;">Name</th>
            <th style="padding: 20px;">Email</th>
            <th style="padding: 20px;">Phone</th>
            <th style="padding: 20px;">Guest</th>
            <th style="padding: 20px;">Date</th>
            <th style="padding: 20px;">Time</th>
            <th style="padding: 20px;">Massage</th>
        </tr>
        @foreach ($data as $data )
        <tr align="center">
          <td>{{ $data->name }}</td>
          <td>{{ $data->email }}</td>
          <td>{{ $data->phone }}</td>
          <td>{{ $data->guest }}</td>
          <td>{{ $data->date }}</td>
          <td>{{ $data->time }}</td>
          <td>{{ $data->massage }}</td>
        </tr>
        @endforeach
        
     
        </table>
     </div>
    </div>
      
        @include("Admin.Adminjs")
  </body>
</html>
    </x-app-layout>
