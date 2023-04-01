
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminCss')
</head>
<body>
<div>
    @include('admin.adminHeader')
</div>
<div class="container-scroller" style="margin-top:120px">
    @include('admin.navbar')
    <div class="col-md-8 mx-auto">
                <table class="table" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->foodname}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->price * $data->quantity}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
</div>
</script>

    @include('admin.adminCsript')
</body>
</html>
