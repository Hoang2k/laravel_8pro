@extends('admin.master')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sửa sản phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>



    <form action="{{route('update.Product')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên:</strong>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                @error('name')
                  <span class="text-danger">{{$message}}</span>

                 @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mô tả</strong>
                    <textarea class="form-control" style="height:50px" name="description" value="{{$product->description}}"
                        placeholder="Nhập Mô tả"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá</strong>
                    <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm"
                        value="{{$product->price}}">
                </div>
                @error('price')
                    <span class="text-danger">{{$message}}</span>

                 @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá khuyến mại</strong>
                    <input type="number" name="price_sale" class="form-control" placeholder="Nhập giá khuyến mại"
                        value="{{$product->price}}">
                </div>
                @error('price_sale')
                 <span class="text-danger">{{$message}}</span>

                    @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hình ảnh</strong>
                    <input type="file" name="photo" class="form-control" placeholder="Nhập ảnh sản phẩm"
                        value="{{$product->image}}">
                </div>
                @error('photo')
                 <span class="text-danger">{{$message}}</span>

                    @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số lượng</strong>
                    <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng"
                        value="{{$product->quantity}}">
                </div>
                @error('quantity')
                 <span class="text-danger">{{$message}}</span>

                    @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Danh mục</strong>
                    <select class="form-control" value="" name="category_id" id="">
                                
                                      @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->name}}</option>
                                     @endforeach
                                      </select>  
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{route('admin.list.product')}}" class="btn btn-danger">Trở Lại</a>
            </div>
        </div>

    </form>
@endsection