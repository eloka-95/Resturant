
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
                    <form action="{{ url("/uploadfood") }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label>Title</label>
                            <input style="color:black" type="text" name="title" placeholder="Add Food Title" required>
                        </div>

                        <div>
                            <label>Price</label>
                            <input style="color:black" type="num" name="price" placeholder="Add Food price" required>
                        </div>

                    <div>
                        <label>Image</label>
                        <input style="color:aqua" type="file" name="image" required>
                    </div>

                    <div>
                        <label>Description</label>
                        <input style="color:black" type="text" name="description" placeholder="Add Food description" required>
                    </div>

                    <div>
                        <input style=" color:aqua; " type="submit" value="save">   
                    </div>            
                </form>


                <div>
                    <table style="background-color: black;">
                        <tr>
                        <th style="padding: 20px;">Food name</th>
                        <th style="padding: 20px;">Price</th>
                        <th style="padding: 20px;">Description</th>
                        <th style="padding: 20px;">Image</th>
                        <th style="padding: 20px;">Remove image</th>
                        <th style="padding: 20px;">Update image</th>
                    </tr>
                    @foreach ($data as $data )
                    <tr align="center">
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{  $data->description }}</td>
                        <td> <img style="width: 50px; height:100px;" src="/foodimage/{{ $data->image }}" ></td>
                        <td><a href="{{ url('/deletemenu', $data->id) }}" style="color: red;"> Delete</a></td>
                        <td><a href="{{ url('/updateview',$data->id) }}" style="color: aqua;"> Update</a></td>

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
