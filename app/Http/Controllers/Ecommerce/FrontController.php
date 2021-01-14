<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Seller;
use Auth;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->where('status','!=',0)->paginate(10);
        return view('ecommerce.index', compact('products'));
    }
    
    public function product()
    {
    //$products = Product::orderBy('created_at', 'DESC')->paginate(12);
    $seller_id = Auth::user()->sellers->id;
    $products = Product::where('seller_id','!=',$seller_id )->where('status','!=',0)->orderBy('created_at', 'DESC')->paginate(12);
    //$products = Product::orderBy('created_at', 'DESC')->paginate(12);
    return view('ecommerce.product', compact('products'));
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $products = Product::where('name','like',"%".$cari."%")->where('seller_id','!=',Auth::user()->sellers->id )->where('status','!=',0)->orderBy('created_at', 'DESC')->paginate();
        return view('ecommerce.product',compact('products'));
    }
    public function products_seller($shop_name)
    {
        $show_seller = Seller::where('shop_name',$shop_name)->first();
        $seller_id = Seller::where('shop_name',$shop_name)->value('id');
        $products = Product::where('seller_id',$seller_id )->where('status','!=',0)->orderBy('created_at', 'DESC')->paginate();
        return view('ecommerce.product_seller',compact('products','show_seller'));
    }

    public function categoryProduct($slug)
    {
   //CARI KATEGORI BERDASARKAN SLUG, SETELAH DATANYA DITEMUKAN
   //MAKA SLUG AKAN MENGAMBIL DATA PRODUCT YANG BERELASI MENGGUNAKAN METHOD PRODUCT() YANG TELAH DIDEFINISIKAN PADA FILE CATEGORY.PHP SERTA DIURUTKAN BERDASARKAN CREATED_AT 
    $products = Category::where('slug', $slug)->first()->product()->where('seller_id','!=',Auth::user()->sellers->id )->where('status','!=',0)->orderBy('created_at', 'DESC')->paginate(12);
    return view('ecommerce.product', compact('products'));
    }

    public function show($slug)
    {
    //QUERY UNTUK MENGAMBIL SINGLE DATA BERDASARKAN SLUG-NYA
    $product = Product::with(['category'])->where('slug', $slug)->first();
    return view('ecommerce.show', compact('product'));
    }

   
}
