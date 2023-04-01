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
                <h3 class="text-center">Update Item Maker</h3>
                <form action="{{url('/updateitemmaker',$itemmakerdatas->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control text-white" value="{{$itemmakerdatas->name}}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Speciality</label>
                        <div class="col-md-8">
                            <input type="text" name="speciality" class="form-control text-white" value="{{$itemmakerdatas->speciality}}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="" class="col-md-3">Old Image</label>
                        <div class="col-md-8">
                            <img style="height: 50px;width: 60px;" src="admin/assets/image/itemmaker/{{$itemmakerdatas->image}}" alt="">
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
                            <input type="submit" class="btn btn-success" value="Update Item Maker">
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
