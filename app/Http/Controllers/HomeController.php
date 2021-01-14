<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use App\User;
use App\Seller;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Seller::where('user_id', Auth::user()->id)->first() != null ) {
            $pendapatan = DB::table('pendapatan')->where('seller_id', Auth::user()->sellers->id)->value('total_pendapatan');
            $produk_terjual = DB::table('produk_terjual')->where('seller', Auth::user()->sellers->id)->orderBy('product')->get();
            //dd($produk_terjual);
            $array_produk[] = ['Produk','Jumlah'];
            foreach($produk_terjual as $key =>$value) {
                $array_produk[++$key] = [$value->product, floatval($value->jumlah_terjual)];
            }
            $pendapatan_harian = DB::table('pendapatan_harian')->where('seller_id',Auth::user()->sellers->id)->orderBy('tanggal')->get();
            $array_pendapatan[] = ['tanggal','pendapatan'];
            foreach($pendapatan_harian as $key => $phari) {
                $array_pendapatan[++$key] = [$phari->tanggal, floatval($phari->pendapatan)];
            }
            //dd(json_encode($array_pendapatan));
            return view('home_toko',compact('pendapatan','produk_terjual','pendapatan_harian'))
                        ->with('chart_produk',json_encode($array_produk))
                        ->with('chart_pendapatan',json_encode($array_pendapatan));
        } else {return view('home');}


    }
}
