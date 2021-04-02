
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="fontend/css/bootstrap.css">
    <link rel="stylesheet" href="fontend/css/style.css" >
    <link rel="stylesheet" href="fontend/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar navbar-expand-md">
        <div class="container-fluid ">
            <ul class="navbar-nav">
                <li class="nav-item menu"><a class="nav-link" href="{{route('index')}}">TRANG CHỦ</a></li>
                <li class="nav-item menu"><a class="nav-link" href="#">GIỚI THIỆU</a></li>
                @foreach($category as $cate)
                <li class="nav-item menu">
                    <a class="nav-link menu" href="{{route('product.type',['id'=>$cate->id])}}">{{$cate->name}}</a>
                    <!-- <ul class="sub-menu">
                        <li><a  href="#">SẮT THÉP CÂY</a></li>
                        <li><a  href="#">SẮT THÉP ỐNG</a></li>
                    </ul> -->
                </li>
                @endforeach
               
                <li class="nav-item menu"><a class="nav-link" href="login.html">TÀI KHOẢN</a></li>
                <li class="nav-item ">
                    <form>
                        <input class="input-search" type="text" placeholder="Tìm Kiếm">
                        <input class="btn" type="button"><i class="fa fa-search fa-lg" aria-hidden="true"></i>
                    </form>
                </li>
                <li class="nav-item menu ">
                    <a class="nav-link cart" href="#"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="index-content"><!--phần nội dung-->
        <div class="sp-ban-chay">
           <div class="link"><a>Trang chủ</a> / <p style="text-transform: capitalize;display: inline;"></p>{{$category[0]->name}}</p> </div>
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
    <div class="footer">
        <div class="container-fluid footer-top">
            <p id="fist">Gọi ngay để tư vấn</p>
            <p>Gọi cho chúng tôi để nhận thông tin về sản phẩm phù hợp dành cho bạn</p>
        </div>
        <div class="container-fluid row mid">
            <div class="col-lg-3">
                <img src="fontend/img/icon1.jpg">
                <p class="p-fist">Vận chuyển miễn phí</p>
                <p>Với đơn hàng > 600.000đ</p>
            </div>
            <div class="col-lg-3">
                <img src="fontend/img/icon2 (1).jpg">
                <p class="p-fist">Chất lượng đảm bảo</p>
                <p>Hàng chính hãng</p>
            </div>
            <div class="col-lg-3">
                <img src="img/icon3.jpg">
                <p class="p-fist">Đổi trả miễn phí</p>
                <p>Trong vòng 15 ngày</p>
            </div>
            <div class="col-lg-3">
                <img src="fontend/img/icon4.jpg">
                <p class="p-fist">Hỗ trợ miễn phí</p>
                <p>Từ : 6h-12h</p>
            </div>
        </div>
        <div class="container-fluid bottom">
            <div class="row">
                <div class="col-lg-4">
                    <p class="bottom-fist">TP HỒ CHÍ MINH</p>
                    <p>Tầng 11, Tòa nhà Packsimex, 52 Đông Du, Phường Bến Nghé, Quận 1, (Tòa nhà Packsimex)</p>
                    <p>Hotline: 0799 070 777 (Tư vấn - Báo giá)</p>
                </div>
                <div class="col-lg-4">
                    <p class="bottom-fist">NHÀ MÁY SĂT THÉP</p>
                    <p>Chuyên cung cấp các loại vật liệu xây dựng và sắt thép xây dựng khu vực miền nam việt nam</p>
                    <p>Chúng Tôi Cần tìm đối tác tại Miền Bắc</p>
                </div>
                <div class="col-lg-4">
                    <img src="fontend/img/tb-bct.png">
                    <img src="fontend/img/160085386_127178059286266_5871978463262153046_n.png">
                </div>
            </div>
        </div>
    </div>

    
    <script src="fontend/js/jquery-3.5.1.min.js"></script>
	<script src="fontend/js/bootstrap.js"></script>  
</body>
</html>