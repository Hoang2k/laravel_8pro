@extends('admin.master')
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


<div class="row">
        <div class="row">
        </div>
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#add_distribution_type">Thêm Mới
                    </button>
                </header>
            </section>
            <section class="panel">
                <header class="panel-heading">
                    Danh Sách Sản Phẩm: <strong class="text-danger">{{$product->total()}}  Sản Phẩm</strong>
                </header>
                <br>
                <div id="" class="col-sm-4">
                    <form method="get" action="{{route('admin.search.product')}}">
                        <div class="input-group">
                            <input name="search" type="text" value="{{Request::get('search')}}" class="form-control" placeholder="{{__("Tìm Kiếm Sản Phẩm")}}">
                            <span class="input-group-btn">
                                    <button  class="btn btn-primary" type="submit"  >{{__("Tìm Kiếm")}}</button>
                                </span>
                        </div>
                    </form>
                </div>
                <br></br>
                <div class="panel-body">
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Giá Khuyến Mại</th>
                                <th>Mô Tả</th>
                                <th>Danh Mục</th>
                                <th>Hình Ảnh</th>
                                <th>Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                         @foreach($product as  $pro)
                                <tr>
                                    <td class="text-center" data-title="ID">
                                        <a class="btn btn-primary" href="">{{$pro->id}}</a>
                                    </td>
                                    <td data-title="Tên">{{$pro->name}}</td>
                                    <td data-title ="Giá">{{$pro->price}}</td>
                                    <td data-title ="Giá">{{$pro->price_sale}}</td>
                                    <td data-title="Mô Tả">{{$pro->description}}</td>
                                    <td data-title="Danh Mục">{{$pro->category->name}}</td>
                                    <td data-title="Hình Ảnh">{{$pro->images}}</td>
                                    <td data-title="Tác Vụ">
                                        <a class="btn btn-primary" href="{{route('getProduct',['id'=>$pro->id])}}"  >Sửa</a>
                                        <a class="btn btn-danger" href="{{route('delete.product',['id'=>$pro->id])}}">Xóa</a>
                                    </td>
                                </tr>
                          @endforeach
                            </tbody>
                        </table>
                        {{ $product->appends(Request::all())->links() }}
                    </section>
                </div>
            </section>
            

            <!-- Modal adđ product -->
           
                <div id="add_distribution_type" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{__('Thêm Mới Sản Phẩm')}}</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('addProduct')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Sản Phẩm<span class="text-danger">(*)</span></label>
                                        <input type="text" name="name" value=""
                                               id="name" class="form-control"
                                               placeholder="Nhập tên sản phẩm để thêm mới">
                                             @error('name')
                                              <span class="text-danger">{{$message}}</span>

                                              @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hình Ảnh<span class="text-danger">(*)</span></label>
                                        <input type="file" name="photo" value="" 
                                               id="image" class="form-control"
                                               placeholder="Chọn Hỉnh Ảnh">
                                               @error('photo')
                                              <span class="text-danger">{{$message}}</span>

                                              @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá<span class="text-danger">(*)</span></label>
                                        <input type="text" name="price" value="" 
                                               id="price" class="form-control"
                                               placeholder="Nhập giá sản phẩm">
                                               @error('price')
                                              <span class="text-danger">{{$message}}</span>

                                              @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá Khuyến Mại</label>
                                        <input type="text" name="price_sale" value="" 
                                               id="price_sale" class="form-control"
                                               placeholder="Nhập giá khuyến mại">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô Tả</label>
                                        <input type="text" name="description" value="" 
                                               id="description" class="form-control"
                                               placeholder="Nhập mô tả">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số Lượng</label>
                                        <input type="text" name="quantity" value="" 
                                               id="quantity" class="form-control"
                                               placeholder="Nhập số lượng">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Danh Mục<span class="text-danger">(*)</span></label>
                                      <select class="form-control" value="" name="category_id" id="">
                                      @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->name}}</option>
                                     @endforeach
                                      </select>  
                                    </div>
                                    <br><br><br>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary"
                                                id="btn_themmoi">{{__("Thêm Mới")}}</button>
                                        <button data-dismiss="modal" class="btn btn-danger"
                                                type="button">{{__("Hủy")}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               


            <!-- Modal edit product -->
           
           <div id="editProduct" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{__('Thêm Mới Sản Phẩm')}}</h4>
                            </div>
                            <div class="modal-body">
                                <form id="editProductForm">
                            
                                    {{ csrf_field() }}
                                    <input type="hidden" id="id" name="id" />
                                    <div class="form-group">
                                        <label for="">Sản Phẩm<span class="text-danger">(*)</span></label>
                                        <input type="text" name="name2" value="" required="required"
                                               id="name2" class="form-control">
                                              
                                    </div>
                
                                
                                    <br><br><br>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary"
                                                id="btn_themmoi">{{__("Thêm Mới")}}</button>
                                        <button data-dismiss="modal" class="btn btn-danger"
                                                type="button">{{__("Hủy")}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               

       
             
    
            
        </div>
       



    
      
           
           
@endsection
