 @extends('frontend.master')
 @section('content')
    
    <div class="index-content"><!--phần nội dung-->
        <div class="sp-ban-chay">
           <div class="link"><span>Tìm thấy :</span><p style="text-transform: capitalize;display: inline;color:red ">{{$product->total()}} sản phẩm</p> </div>
           <p class="product-title"></p>
            <div class="row">
                
            @foreach($product as $pro)
                <div class="col-lg-3" >
                    <a href="a"><img src="fontend/img/{{$pro->images}}"></a>
                    <a href="#"><p class="index-tensp">{{$pro->name}}</p></a>
                    <p class="gia-sp">{{$pro->price_sale}}</p>
                    <p class="gia-cu">{{$pro->price}}</p>
                </div>
              @endforeach 
            
            </div>
        </div>
        
    </div><!--end phần nội dung-->
    @endsection