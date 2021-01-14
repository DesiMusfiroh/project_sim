<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Seller;

class SellerController extends Controller
{
   
    public function index()
    {     
        return view('profiles.seller');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'shop_name' => 'required',
            'shop_desc' => 'required',
            'location' => 'required',
            
        ]);
    
        Seller::create([
            'user_id' => $request->user_id,
            'shop_name' => $request->shop_name,
            'shop_desc' => $request->shop_desc,
            'location' => $request->location,
        ]);
        
        return redirect()->back()
        ->with('success','Great! Profil berhasil di simpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $seller = Seller::find($id);
        return view('profiles.seller_edit', ['seller' => $seller]);  
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'shop_name' => 'required',
            'shop_desc' => 'required',
            'location' => 'required',
            
        ]);

        $update = [
            'user_id' => $request->user_id,
            'shop_name' => $request->shop_name,
            'shop_desc' => $request->shop_desc,
            'location' => $request->location,
        ];

        Seller::whereId($id)->update($update);
   
        return redirect('/administrator/seller')
       ->with('success','Great! Biodata berhasil di update');
    }

    public function destroy($id)
    {
        //
    }
}
