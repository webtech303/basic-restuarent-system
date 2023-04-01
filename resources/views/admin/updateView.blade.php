<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.adminCss')
</head>
<body>
<div>
    @include('admin.adminHeader')
</div>
<div class="container-scroller" style="position: relative; margin-top: 80px">
    @include('admin.navbar')
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-md-6 mx-auto">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <span class="text-success">{{Session::has('message') ? Session::get('message') : ""}}</span>
                    </div>
                </div>
                <h3 class="text-center">Update Food Item</h3>
                <form action="{{url('/updateItem',$datas->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control text-white" value="{{$datas->title}}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Price</label>
                        <div class="col-md-8">
                            <input type="number" name="price" class="form-control text-white" value="{{$datas->price}}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Description</label>
                        <div class="col-md-8">
                            <input type="text" name="description" class="form-control text-white" value="{{$datas->description}}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Old Image</label>
                        <div class="col-md-8">
                            <img style="height: 50px;width: 60px;" src="admin/assets/image/itemimage/{{$datas->image}}" alt="">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control text-white" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-success" value="Update Food">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @include('admin.adminCsript')
</body>
</html>
