<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminCss')
</head>
<body>
<div>
    @include('admin.adminHeader')
</div>
    <div class="container-scroller" style="margin-top: 80px">
        @include('admin.navbar')
        <div class="col-md-8  mx-auto" style="position: relative; margin-top: 50px">
            <div class="row">
                <div class="col-md-6">
                    <span class="text-success text-center">{{Session::has('message') ? Session::get('message') : ""}}</span>
                </div>
            </div>
            <h2 class="text-center">Create ItemMaker</h2>
            <form action="{{url('/uploaditemmaker')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <label for="" class="col-md-3">Name</label>
                    <div class="col-md-8">
                        <input type="text" name="name" class="form-control text-white" placeholder="write name" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <label for="" class="col-md-3">Speciality</label>
                    <div class="col-md-8">
                        <input type="text" name="speciality" class="form-control text-white" placeholder="Write your speciality" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <label for="" class="col-md-3">Image</label>
                    <div class="col-md-8">
                        <input type="file" name="image" class="form-control text-white" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-3"></label>
                    <div class="col-md-9">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </div>
            </form>

            <div class="row" style="position: relative; margin-top: 150px">
                <div class="col-md-10 mx-auto">
                    <table class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item Maker Name</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                        @foreach($itemmakerdatas as $itemmakerdata)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$itemmakerdata->name}}</td>
                                                <td>{{$itemmakerdata->speciality}}</td>
                                                <td><img src="admin/assets/image/itemmaker/{{$itemmakerdata->image}}" alt="" style="height: 50px; width: 60px; border-radius: 0"></td>
                                                <td>
                                                    <a href="{{url('/updateitemmakers',$itemmakerdata->id)}}">Update</a>
                                                    <a href="{{url('/deleteitemmaker',$itemmakerdata->id)}}" onclick="return confirm('are you sure to delete this')">Delete</a>
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
