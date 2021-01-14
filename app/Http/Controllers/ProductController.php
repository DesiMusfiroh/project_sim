<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Category;
use Illuminate\Support\Str;
use File;
use Auth;
use App\User;
use App\Seller;

class ProductController extends Controller
{
    public function index()
    {
        $seller_id = Auth::user()->sellers->id;
        $product = Product::where('seller_id','=',$seller_id )->with(['category'])->orderBy('created_at', 'DESC');
        // $product = Product::with(['category'])->orderBy('created_at', 'DESC');
      
        //JIKA TERDAPAT PARAMETER PENCARIAN DI URL ATAU Q PADA URL TIDAK SAMA DENGAN KOSONG
        if (request()->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }
      
        $product = $product->paginate(10);
        return view('products.index', compact('product'));
    }

    public function create()
    {

    $category = Category::orderBy('name', 'DESC')->get();
    return view('products.create', compact('category'));
    }

    public function store(Request $request)
    {
   
    $this->validate($request, [
        'name' => 'required|string|max:100',
        'seller_id' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id', //CATEGORY_ID di CEK HARUS ADA DI TABLE CATEGORIES DENGAN FIELD ID
        'price' => 'required|integer',
        'weight' => 'required|integer',
        'image' => 'required|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
    ]);

    //JIKA FILENYA ADA
    if ($request->hasFile('image')) {
        //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
        $file = $request->file('image');
        //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA mengGUNAKAN BAWAAN FILE TERSEBUT
        $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        //menyimpan FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
        //$file->storeAs('public/products', $filename);
        $tujuan = 'storage/products';
        $file->move($tujuan,$filename);

        //SETELAH FILE TERSEBUT DISIMPAN, lalu akan diSIMPAN INFORMASI PRODUKNYA KEDALAM DATABASE
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->name,
            'seller_id' => $request->seller_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $filename, 
            'price' => $request->price,
            'weight' => $request->weight,
            'status' => $request->status
        ]);
        //JIKA SUDAH MAKA REDIRECT KE LIST PRODUK
        return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }

    public function edit($id)
{
    $product = Product::find($id); //AMBIL DATA PRODUK TERKAIT BERDASARKAN ID
    $category = Category::orderBy('name', 'DESC')->get(); //AMBIL SEMUA DATA KATEGORI
    return view('products.edit', compact('product', 'category')); //LOAD VIEW DAN PASSING DATANYA KE VIEW
}

public function update(Request $request, $id)
{
   //VALIDASI DATA YANG DIKIRIM
    $this->validate($request, [
        'name' => 'required|string|max:100',
        'seller_id' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|integer',
        'weight' => 'required|integer',
        'image' => 'nullable|image|mimes:png,jpeg,jpg' //IMAGE BISA NULLABLE
    ]);

    $product = Product::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
    $filename = $product->image; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
  
    //JIKA ADA FILE GAMBAR YANG DIKIRIM
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        //MAKA UPLOAD FILE TERSEBUT
        //$file->storeAs('public/products', $filename);
        $tujuan = 'storage/products';
        $file->move($tujuan,$filename);
      	//DAN HAPUS FILE GAMBAR YANG LAMA
        File::delete(storage_path('app/public/products/' . $product->image));
    }

  //KEMUDIAN UPDATE PRODUK TERSEBUT
    $product->update([
        'name' => $request->name,
        'seller_id' => $request->seller_id,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'weight' => $request->weight,
        'image' => $filename,
        'status' => $request->status

    ]);
    return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
}

    public function destroy($id)
{
    $product = Product::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
    //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
    File::delete(storage_path('app/public/products/' . $product->image));
    //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
    $product->delete();
    //DAN REDIRECT KE HALAMAN LIST PRODUK
    return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
}

}