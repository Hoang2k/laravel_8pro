@extends('frontend.master')
 @section('content')
    <div class="detail-content"><!--content-->
    @if(Auth::check())
        <div class="container-fluid row">
            <div class="col-lg-6">
                <img src="fontend/img/{{$product->images}}">
            </div>
            <div class="col-lg-6 detail">
                <h4>{{$product->name}}</h4>
                <p>{{$product->price}}/bao</p>
                <p>Số lượng :</p>
                <form id="form-number" method="get" action="{{route('user.account.address',['id'=>$product->id])}}">
                    <input class="input-change" type="button" value="-">
                    <input id="input-value" type="" name="quantity" value="1">
                    <input class="input-change" type="button" value="+">
               
               
               
                <div class="btn-buy"><button  >Mua Ngay</button></div>
                </form>
                @else
                <div class="container-fluid row">
            <div class="col-lg-6">
                <img src="fontend/img/{{$product->images}}">
            </div>
            <div class="col-lg-6 detail">
                <h4>{{$product->name}}</h4>
                <p>{{$product->price}}<span  style="color:red;">đ</span></p>
                <p>Số lượng :</p>
                <form id="form-number" method="get" action="{{url('/login-register')}}">
                    <input class="input-change" type="button" value="-">
                    <input id="input-value" type="button" name="quantity" value="1">
                    <input class="input-change" type="button" value="+">
               
               
               
                <div class="btn-buy"><button  >Mua Ngay</button></div>
                </form>
              
                @endif
                

                
            </div>
        </div>
        <div class="test">
            <b>Mô tả : </b><span>{{$product->description}}</span>
        </div>
    </div>
    
 
</div> 
   
    @endsection