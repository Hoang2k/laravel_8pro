@extends('frontend.master')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="" style="margin:100px;">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <i style="color:red" class="fas fa-map-marker-alt"></i> <h2 style="color:red">Địa Chỉ Nhận Hàng</h2>
            </div>
        </div>
    </div>



    <form action="{{route('customer.order')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Họ & Tên:</strong>
                    <input type="text" name="name" value="" class="form-control" placeholder="Nhập Họ & Tên">
                </div>
                @error('name')
                  <span class="text-danger">{{$message}}</span>

                 @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số điện thoại</strong>
                    <input type="phone" name="phone" value="" class="form-control" placeholder="Nhập số điện thoại">
                </div>
                @error('phone')
                  <span class="text-danger">{{$message}}</span>

                 @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Địa chỉ nhận :</strong>
                    <input type="text" name="address" class="form-control" placeholder="Số Nhà,Tên Đường, Quận/Huyện, Tinh/Thành Phố..."
                        value="">
                </div>
                @error('address')
                    <span class="text-danger">{{$message}}</span>

                 @enderror
            </div>
            
            
          
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
            <strong>Tổng tiền hàng <span style="color:red;"> ({{$quantity}} sản phẩm) :</span> <label style="color:red;font-size:20px;" name="price_total" value="{{$price}}">{{$price}} đ</label></strong>
            <br>
                <button type="submit" class="btn btn-primary">Đặt Hàng</button>
                
            </div>
            </div>
           
        </div>

    </form>
    </div>
@endsection