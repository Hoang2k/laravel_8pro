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

    <div class="login-content"><!--content-->
        <div><h4 class="login-title">Đăng nhập / Đăng kí</h4></div>
        <div class="row">
            <div class="col-lg-6">
                <p>Đăng nhập</p>
                <form id="form-dn" method="post" action="{{route('login.customer')}}">
                {{csrf_field()}}
                    <input type="email" name="email" placeholder="Email của bạn" >
                    @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                    <input type="password" name="password" placeholder="Nhập mật khẩu của bạn">
                    @error('password')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                    <button>Đăng nhập</button>
                </form>
            </div>
            <div class="col-lg-6">
                <p>Đăng kí thành viên mới</p>
                <form  id="form-dk" method="post" action="{{route('register.customer')}}">
                {{ csrf_field() }}
                    <input type="text" placeholder="Họ và tên" name="username2">
                  @error('username2')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                    <input type="email"placeholder="Email của bạn" name="email2" >
                    @error('email2')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                    <input type="password" placeholder="Nhập mật khẩu của bạn" name="password2">
                    @error('password2')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                    <button>Đăng kí</button>
                </form>
            </div>
        </div>

    </div> <!--end content-->
  
@endsection