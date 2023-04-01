<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach($datas as $data)

                        <div class="item">
                            <div style="background-image: url('admin/assets/image/itemimage/{{$data->image}}'); " class='card'>
                                <div class="price"><h6>{{$data->price}}</h6></div>
                                <div class='info'>
                                    <h1 class='title'>{{$data->title}}</h1>
                                    <p class='description'>{{$data->description}}</p>
                                    <div class="main-text-button">
                                        <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{url('/addcart',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
{{--                            <input type="hidden" name="user_id"  value="{{Auth::user()->id}}" style="width: 100px">--}}
                            <input type="hidden" name="food_id"  value="{{$data->id}}" style="width: 100px">
                            <input type="number" name="quantity" min="1" value="1" style="width: 100px">
                            <input type="submit" value="Add Card">
                            </form>
                        </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->
