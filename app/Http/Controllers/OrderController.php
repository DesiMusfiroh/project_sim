<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\Order;
use App\Product;
use App\Customer;
use App\Seller;
use App\OrderDetail;
use PDF;


class OrderController extends Controller
{
    
    public function pembelian()
    {
        $customer_id = Auth::user()->customers->id;
        $orders = Order::where('customer_id',$customer_id)->orderBy('created_at','desc')->paginate(10);
        return view('transaksi.pembelian', compact('orders'));
    }
    public function penjualan()
    {
        //$seller_id = Auth::user()->sellers->id;
        $order_details = OrderDetail::join('products',function ($join){
            $join->on('product_id','=','products.id')->where('products.seller_id','=',Auth::user()->sellers->id);
        })->groupBy('order_id')->paginate(10);
        //dd($order_details);
        return view('transaksi.penjualan',compact('order_details'));
    }
    public function detail_order_id($id)
    {
        $order_detail = OrderDetail::where('order_id',$id)->first();
        $details = OrderDetail::join('products',function ($join){
            $join->on('product_id','=','products.id')->where('products.seller_id','=',Auth::user()->sellers->id);
        })->where('order_id',$id)->get();
        return view('transaksi.penjualan_detail', ['details' => $details], ['order_detail' => $order_detail]);
    }
    public function order_finish($id)
    {       
        $updatedetail = Product::where('seller_id', Auth::user()->sellers->id )->join('order_details',function($join){
            $join->on('products.id','=','order_details.product_id');
        })->where('order_details.order_id',$id)->get();
                                        
        $array[] = ['id'];

        foreach ($updatedetail as $key => $row){
            $update_order_finish = [
                'status' => '1',
            ];
            $array[++$key] = [$row->id];

            OrderDetail::where('id',$row['id'])->update($update_order_finish);
        }
        return redirect()->back();
    }
    public function pdf($invoice)
    {
        //GET DATA ORDER BERDASRKAN INVOICE
        $order = Order::where('invoice', $invoice)->first();
        //JIKA DIA ADALAH PEMILIKNYA, MAKA LOAD VIEW BERIKUT DAN PASSING DATA ORDERS
        $pdf = PDF::loadView('ecommerce.invoice_pdf', compact('order'));
        //KEMUDIAN BUKA FILE PDFNYA DI BROWSER
        return $pdf->stream();
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
