<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\Slide;
use Illuminate\Http\Request;

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
}
