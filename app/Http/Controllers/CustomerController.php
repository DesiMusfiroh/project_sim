<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use App\Faculty;
use App\Prody;
use App\Customer;
use App\User;
use Auth;

class CustomerController extends Controller
{
   
    public function index()
    {
        $universities = University::orderBy('created_at', 'DESC')->get();      
        return view('profiles.index', compact('universities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'prody_id' => 'required',
            'address' => 'required',
            'photo' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        
        $file = $request->file('photo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        Customer::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'prody_id' => $request->prody_id,
            'address' => $request->address,
            'photo' => $nama_file,
        ]);
        
        return redirect()->back()
        ->with('success','Great! Biodata berhasil di simpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $universities = University::orderBy('created_at', 'DESC')->get();
        
        $customer = Customer::find($id);
        return view('profiles.edit', ['customer' => $customer, 'universities' => $universities]);  
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'prody_id' => 'required',
            'address' => 'required',
            'photo' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);
  
        $file = $request->file('photo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        $update = [
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'prody_id' => $request->prody_id,
            'address' => $request->address,
            'photo' => $nama_file,
        ];

        Customer::whereId($id)->update($update);
   
        return redirect('/administrator/profil')
       ->with('success','Great! Biodata berhasil di update');
    }

    public function destroy($id)
    {
        //
    }
}
