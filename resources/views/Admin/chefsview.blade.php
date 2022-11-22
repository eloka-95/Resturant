
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
        <div style="position: relative; top:60px; right:-150px;">
          <form action="{{ url('/submitchef') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div>
                  <label>Name</label>
                  <input style="color:black" type="text" name="name" placeholder="Name" value="" required>
              </div>

              <div>
                  <label>Speciality</label>
                  <input style="color:black" type="num" name="specialty" placeholder="specialty" value="" required>
              </div>

          <div>
              <label> New Image</label>
              <input style="color:aqua" type="file" name="image">
          </div>

          <div>
              <input style=" color:aqua; " type="submit" value="save">   
          </div>            
      </form>

      <div >
        <table style="background-color: black;">
            <tr>
                <th style="padding: 30px;">chef name</th>
                <th style="padding: 30px;">chef speciality</th>
                <th style="padding: 30px;">chef image</th>
                <th style="padding: 30px;">Delete chef</th>
                <th style="padding: 30px;">Update chef</th>
            </tr>
            @foreach ( $data as $data )
            <tr align="center">
                <td>{{ $data->name }}</td>
                <td>{{ $data->specialty }}</td>
                <td> <img style= "width: 100px; height:70px;" src="/chefsimage/{{ $data->image }}"></td>
                <td><a href="{{ url('/deletechefimg', $data->id) }}" style="color: red;"> Delete</a></td>
                <td><a href="{{ url('/updatechefimg', $data->id) }}" style="color: rgb(32, 250, 250);"> Update</a></td>
            </tr>
            @endforeach
           
        </table>
      </div>

     </div>

    </div>
        @include("Admin.Adminjs")
  </body>
</html>
    </x-app-layout>
