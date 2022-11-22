
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
                <form action="{{ url('/update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label>Title</label>
                        <input style="color:black" type="text" name="title" value="{{ $data->title }}" required>
                    </div>

                    <div>
                        <label>Price</label>
                        <input style="color:black" type="num" name="price" value="{{ $data->price }}" required>
                    </div>


                <div>
                    <label>Description</label>
                    <input style="color:black" type="text" name="description" value=" {{ $data->description }}" required>
                </div>

                <div>
                    <label>old Image</label>
                    <img style="width: 50px; height:50px; " src="/foodimage/{{ $data->image }}">
                </div>

                <div>
                    <label> New Image</label>
                    <input style="color:aqua" type="file" name="image">
                </div>

                <div>
                    <input style=" color:aqua; " type="submit" value="save">   
                </div>            
            </form>

           </div>

           </div>
           

               @include("Admin.Adminjs")
        </body>
       </html>
</x-app-layout>
