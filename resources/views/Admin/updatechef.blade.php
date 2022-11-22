<x-app-layout>

    <!DOCTYPE html>
       <html lang="en">
           <head>
               <!-- Required meta tags -->
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               <title>Corona Admin</title>
                <base href="/public">
                   @include("Admin.admincss")
           </head>
        <body>
           <div class="container-scroller">

               @include('Admin.nav')

               <div style="position: relative; top:60px; right:-150px;">
                <form action="{{ url('/updatachef', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label>Title</label>
                        <input style="color:black" type="text" name="name" value="{{ $data->name }}" required>
                    </div>

                    <div>
                        <label>Price</label>
                        <input style="color:black" type="text" name="specialty" value="{{ $data->specialty}}" required>
                    </div>

                <div>
                    <label>old Image</label>
                    <img style="width: 50px; height:50px; " src="/chefsimage/{{ $data->image }}">
                </div>

                <div>
                    <label> New Image</label>
                    <input style="color:aqua" type="file" name="image">
                </div>

                <div>
                    <input style=" color:aqua; " type="submit" value="Update">   
                </div>            
            </form>

           </div>

           </div>
           

               @include("Admin.Adminjs")
        </body>
       </html>
</x-app-layout>
