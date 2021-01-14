<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category; 


class CategoryController extends Controller
{

    public function index()
    {
        
        // FUNGSI WITH(), FUNGSI INI DISEBUT EAGER LOADING
        //ADAPUN NAMA YANG DISEBUTKAN DIDALAMNYA ADALAH NAMA METHOD YANG DIDEFINISIKAN DIDALAM MODEL CATEGORY
        //METHOD TERSEBUT BERISI FUNGSI RELATIONSHIPS ANTAR TABLE
        //JIKA LEBIH DARI 1 MAKA DAPAT DIPISAHKAN DENGAN KOMA, 
        // CONTOH: with(['parent', 'contoh1', 'contoh2'])
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
      
        //QUERY INI MENGAMBIL SEMUA LIST CATEGORY DARI TABLE CATEGORIES
        //getParent(), METHOD TERSEBUT ADALAH SEBUAH LOCAL SCOPE
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('categories.index', compact('category', 'parent'));
    }

    public function store(Request $request)
{
   
    $this->validate($request, [
        'name' => 'required|string|max:50|unique:categories'
    ]);

    //FIELD slug AKAN DITAMBAHKAN KEDALAM COLLECTION $REQUEST
    $request->request->add(['slug' => $request->name]);
  
    // $request->except()
    //MENGGUNAKAN SEMUA DATA YANG ADA DIDALAM $REQUEST KECUALI INDEX _TOKEN
    Category::create($request->except('_token'));
    return redirect(route('category.index'))->with(['success' => 'Kategori Baru Ditambahkan!']);
}


public function edit($id)
{
    $category = Category::find($id); //QUERY MENGAMBIL DATA BERDASARKAN ID
    $parent = Category::getParent()->orderBy('name', 'ASC')->get(); //INI SAMA DENGAN QUERY YANG ADA PADA METHOD INDEX
    return view('categories.edit', compact('category', 'parent'));
}

public function update(Request $request, $id)
{
    
    $this->validate($request, [
        'name' => 'required|string|max:50|unique:categories,name,' . $id
    ]);

    $category = Category::find($id); 
    $category->update([
        'name' => $request->name,
        'parent_id' => $request->parent_id
    ]);
  
  
    return redirect(route('category.index'))->with(['success' => 'Kategori Diperbaharui!']);
}


    public function destroy($id)
    {
    
    //FUNGSI INI AKAN MEMBENTUK FIELD BARU YANG BERNAMA product_count
    $category = Category::withCount(['child', 'product'])->find($id);
    //KEMUDIAN PADA IF STATEMENTNYA CEK  JIKA = 0
    if ($category->child_count == 0 && $category->product_count == 0) {
        $category->delete();
        return redirect(route('category.index'))->with(['success' => 'Kategori Dihapus!']);
    }
    return redirect(route('category.index'))->with(['error' => 'Kategori Ini Memiliki Anak Kategori!']);
    }

}
