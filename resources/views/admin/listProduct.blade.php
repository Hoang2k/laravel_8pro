@extends('admin.master')
@section('content')



<div class="row">
        <div class="row">
        </div>
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    Danh Sách Khách Hàng: <strong class="text-danger">{{$customer->total()}}  Khách Hàng</strong>
                </header>
                <br>
                <div id="" class="col-sm-4">
                    <form method="get" action="{{route('admin.search.product')}}">
                        <div class="input-group">
                            <input name="search" type="text" value="{{Request::get('search')}}" class="form-control" placeholder="{{__("Tìm Kiếm Khách Hàng")}}">
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
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
            
                                <th>Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                         @foreach($customer as  $cus)
                                <tr>
                                    <td class="text-center" data-title="ID">
                                        <a class="btn btn-primary" href="">{{$cus->id}}</a>
                                    </td>
                                    <td data-title="Tên">{{$cus->name}}</td>
                                    <td data-title ="Giá">{{$cus->phone}}</td>
                                    <td data-title ="Giá">{{$cus->address}}</td>
                                  
                                
                                    <td data-title="Tác Vụ">
                                    
                                        <a class="btn btn-danger" href="">Xóa</a>
                                    </td>
                                </tr>
                          @endforeach
                            </tbody>
                        </table>
                        {{ $customer->appends(Request::all())->links() }}
                    </section>
                </div>
            </section>
            

            
             
    
            
        </div>
       



    
      
           
           
@endsection
