<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\Bill;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class pageController extends Controller
{
    public function index(){
      
        
        $slide=Slide::all();
        $category=category::all();
     //  $product_new=product::select('SELECT * FROM products ORDER BY id DESC LIMIT 1')->get();
     $product_new=product::where('status',1)->get();
     $product_popular=product::where('sold','>=',500)->get();
       // dd($product_new);
        return view('frontEnd.index',[
            'category'=>$category,
            'slide'=>$slide,
            'product_new'=>$product_new,
            'product_popular'=>$product_popular,
           
        ]);
    }
    public function getProductType(Request $request){
       
        $id=$request->id;
    
          $product=product::with('Category')->where('category_id',$id)->get();
        //  dd($product);
         $category=category::all();
          $categori=category::where('id',$id)->get();
         // dd($category);
         
         return view('frontend.productType',[
             'product'=>$product,
             'category'=>$category,
             'categori'=>$categori,
         ]);
    }
    public function detailProduct($id){
         $product=product::find($id);
         return view('frontend.detailProduct',[
             'product'=>$product,
         ]);
    }

    public function loginAndRegister(){

        return view('frontend.login');
    }
    public function registerCustomer(Request $request){
       $this->validate($request,
       [
           'username2'=>'required|min:4',
           'email2'=>'required|email',
           'password2'=>'required'
       ],[
          'username2.required'=>'Vui lòng nhập tên của bạn',
          'username2.min'=>'Tên ít nhất có 4 kí tự',
          'email2.required'=>'Vui lòng nhập email',
          'email2.email'=>' email không đúng định dạng',
          'password2.required'=>'Vui lòng nhập mật khẩu',
       ]);
       $customer=new user();
         $customer->user_name=$request->username2;
         $customer->email=$request->email2;
         $customer->password=hash::make($request->password2);
         $customer->save();
         return redirect('/login-register')->with('success','Đăng ký thành công');
    }
    public function loginCustomer(Request $request){
        $this->validate($request,
        [
        
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],[
          
           'email.required'=>'Vui lòng nhập email',
           'email.email'=>' email không đúng định dạng',
           'password.required'=>'Vui lòng nhập mật khẩu',
           'password.min'=>'Mật khẩu ít nhất 6 ký tự',
           'password.max'=>' Mật khẩu khong được quá 20 ký tự',
        ]);
        $email=$request->email;
        $password=$request->password;
      
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
           return redirect('/index');
        }
        else
        {
        return back()->with('error','Thông tin tài khoản hoặc mật khẩu không chính xác vui lòng thử lại !');
        }
    }

    public function searchProduct(Request $request){
      $product=product::where('name','like','%'.$request->search.'%')->paginate(9);
       return view('frontend.searchProduct',[
           'product'=>$product
       ]);
    }
    public function logOut(){
        Auth::logout();
        return redirect('/login-register');
    }
    public function getAddressCustomer(Request $request, $id){
        $quantity=$request->input('quantity');
        $product=product::find($id);
        $price=($product->price)*$quantity;
        return view('frontend.addressCustomer',[
            'product'=>$product,
            'price'=>$price,
            'quantity'=>$quantity
        ]);
    }
    public function saveOrder(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required|numeric|between:1,1000000000',
            'address'=>'required'
        ],[
            'name'=>'Vui lòng nhập tên của bạn',
            'phone'=>'Vui lòng nhập số điện thoại',
            'address'=>'Vui lòng nhập địa chỉ nhận hàng',
        ]);
        $bill=new Bill();
        $bill->price_total=$request->price_total;
        $bill->save();
        $customer= new Customer();
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $r=$customer->save();
        if($r)
        return back()->with('success','Bạn đã đặt hàng thành công');
        else
        return back()->with('error','Đặt hàng thất bại !');
    }
    public function getProfileCustomer(Request $request){
        
        return view('frontend.profileCustomer');
    }
}
