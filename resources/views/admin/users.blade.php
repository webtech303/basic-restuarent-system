
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
            <h2 class="text-center">User List</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    @if($data->usertype=="0")
                    <td><a href="{{url('/deleteUser',$data->id)}}" onclick="return confirm('are you sure to delete this')">Delete</a></td>
                    @else
                    <td><a>Not Allowed</a></td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        @include('admin.adminCsript')
</body>
</html>
