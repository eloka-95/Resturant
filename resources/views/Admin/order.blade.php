
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
    <div  class="container-scroller">
   
        @include('Admin.nav')
        @include("Admin.Adminjs")

            <div>
                <form action="{{ url('/search') }}" method="get" >
                    <input type="search" placeholder="search" style="color: black" name="search">
                    <button name="submit" type="submit" class="btn btn-success">search</button>
                </form>


                <table >
                    <tr>
                        <th style="padding: 30px;" >Foodname</th>
                        <th style="padding: 30px;" >Price</th>
                        <th style="padding: 30px;" >Quantity</th>
                        <th style="padding: 30px;" >Name</th>
                        <th style="padding: 30px;" >Phone</th>
                        <th style="padding: 30px;" >Address</th>
                        <th style="padding: 30px;" >Totalprice</th>
                    </tr>
                    @foreach ($data as $data )
                    <tr align="center" style="background-color: brown">
                        <td>{{ $data->foodname }}</td>
                        <td>{{ $data->price }}$</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->price * $data->quantity }}$</td>
                    </tr>
                    @endforeach
                    
                </table>

            </div>

        </div>
  </body>
</html>
    </x-app-layout>
