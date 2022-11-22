
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

                <div style="position: relative; top:60px; right:-150px">
                    <table bgcolor="grey" border="3px">
                        <tr>
                            <th style="padding: 30px;">Name</th>
                            <th style="padding: 30px;">Email</th>
                            <th style="padding: 30px;">Action</th>
                        </tr>
                        @foreach ($data as $data )
                        <tr align="center">
                            <td style="padding: 30px;">{{ $data->name }}</td>
                            <td style="padding: 30px;">{{ $data->email }}</td>
                            @if ($data->usertype =="0")
                            <td style="padding: 30px;"><a href="{{ url("/deleteuser", $data->id) }}" style="color:aqua;">Delete</a></td>
                            @else
                            <td style="padding: 30px;"><a style="color:aqua;">Not Allowed</a></td>
                            @endif
                        </tr>
                        @endforeach
                        
                    </table>
                </div>

            </div>

                

                @include("Admin.Adminjs")
         </body>
        </html>
</x-app-layout>
