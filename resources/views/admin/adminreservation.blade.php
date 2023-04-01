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
    <div class="col-md-10  mx-auto" style="position: relative; margin-top: 50px">
        <h2 class="text-center">Reservation List</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Message</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->time}}</td>
                    <td>{{$data->message}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.adminCsript')
</body>
</html>
