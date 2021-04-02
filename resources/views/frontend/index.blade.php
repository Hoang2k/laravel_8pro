@extends('frontend.master')
 @section('content')
    <div class="index-top container-fluid"><!--phần top-->
        
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">


                @foreach($slide as $sl)
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="fontend/img/{{$sl->image}}" alt="First slide">
                  </div>
                  @endforeach
                  


                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        
    </div><!--end top-->
    <div class="index-content"><!--phần nội dung-->
        <div class="sp-ban-chay">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                    <h5 class="index-title">SẢN PHẨM BÁN CHẠY</h5>
                </div>
                <div class="col-lg-5"></div>
            </div>
            <div class="row">
                @foreach($product_popular as $pro_popular)
                <div class="col-lg-3">
                    <a href="{{route('detail.product',['id'=>$pro_popular->id])}}"><img src="fontend/img/{{$pro_popular->images}}"></a>
                    <a href="{{route('detail.product',['id'=>$pro_popular->id])}}"><p class="index-tensp">{{$pro_popular->name}}</p></a>
                    <p class="gia-sp">{{$pro_popular->price}}<span  style="color:red;">đ</span></p>
                </div>
               @endforeach
               
            </div>
        </div>
        <div class="sp-moi">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                    <h5 class="index-title">SẢN PHẨM MỚI</h5>
                </div>
                <div class="col-lg-5"></div>
            </div>
            <div class="row">
            @foreach($product_new as $pro_new)
                <div class="col-lg-3">
                    <a href="#"><img src="fontend/img/{{$pro_new->images}}"></a>
                    <a href="#"><p class="index-tensp">{{$pro_new->name}}</p></a>
                    <p class="gia-sp">{{$pro_new->price}}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div><!--end phần nội dung-->\
    @endsection