
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminCss')
</head>
<body>
<div>
    @include('admin.adminHeader')
</div>
<div class="container-scroller" style="margin-top: 120px">
    @include('admin.navbar')
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
             <div class="row">
                 <div class="col-md-6 text-center">
                     <span class="text-success">{{Session::has('message') ? Session::get('message') : ""}}</span>
                 </div>
             </div>
            <h1 class="text-center">Add Food Item</h1>
             <form action="{{url('/uploadItem')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="row mt-2">
                     <label for="" class="col-md-3">Title</label>
                     <div class="col-md-8">
                         <input type="text" name="title" class="form-control text-white" placeholder="write a title" required>
                     </div>
                 </div>
                 <div class="row mt-2">
                     <label for="" class="col-md-3">Price</label>
                     <div class="col-md-8">
                         <input type="number" name="price" class="form-control text-white" placeholder="price" required>
                     </div>
                 </div>
                 <div class="row mt-2">
                     <label for="" class="col-md-3">Image</label>
                     <div class="col-md-8">
                         <input type="file" name="image" class="form-control text-white" required>
                     </div>
                 </div>
                 <div class="row mt-2">
                     <label for="" class="col-md-3">Description</label>
                     <div class="col-md-8">
                         <input type="text" name="description" class="form-control text-white" placeholder="Description" required>
                     </div>
                 </div>
                 <div class="row mt-3">
                     <label for="" class="col-md-3"></label>
                     <div class="col-md-9">
                         <input type="submit" class="btn btn-success" value="Add Food">
                     </div>
                 </div>
             </form>
        </div>
    </div>

        <div class="row" style="position: relative; margin-top: 150px">
            <div class="col-md-8 mx-auto">
                <table class="table" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->description}}</td>
                        <td><img src="admin/assets/image/itemimage/{{$data->image}}" alt="" style="height: 50px; width: 60px; border-radius: 0"></td>
                        <td>
                            <a href="{{url('/updateItems',$data->id)}}">Update</a>
                            <a href="{{url('/deleteItem',$data->id)}}" onclick="return confirm('are you sure to delete this')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

     </div>
</div>

@include('admin.adminCsript')
</body>
</html>
