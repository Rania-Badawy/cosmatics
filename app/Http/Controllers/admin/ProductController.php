<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function dashboard()
    {
        return view("admin.all");
    }
    public function all()
    {
        $products = Product::paginate(5);
        return view('admin.product.allProduct', get_defined_vars());
    }
    ///////////////////////////////
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("admin.product.showProduct", get_defined_vars());
    }
    /////////////////////////////////
    public function add()
    {
        $categories = Category::all();
        return view("admin.product.addProduct", get_defined_vars());
    }
    /////////////////////////
    public function insert(Request $request)
    {
        $data = $request->validate([
            "name"         => "required|string|max:100",
            "desc"         => "required|string",
            "image"        => "required|image|mimes:png,jpg,jpeg,gif",
            "price"        => "required|numeric",
            "quantity"     => "required|numeric",
            "category_id"  => "required"
        ]);
        $data['image'] = Storage::putFile('product', $data['image']);
        $data['offer'] = $request->offer;
        $data['new_price'] = $request->new_price;
        Product::create($data);
        session()->flash("success", "data inserted successfully");
        return redirect(url("/products"));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view("admin.product.editProduct", get_defined_vars());
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            "name"         => "required|string|max:100",
            "desc"         => "required|string",
            "image"        => "image|mimes:png,jpg,jpeg,gif",
            "price"        => "required|numeric",
            "quantity"     => "required|numeric",
            "category_id"  => "required",
        ]);
        $product = Product::findOrFail($id);
        if ($request->hasFile("image")) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $data['image'] = Storage::putFile('product', $data['image']);
        }
        $data['offer'] = $request->offer;
        $data['new_price'] = $request->new_price;
        $product->update($data);
        session()->flash("success", "data updated successfully");
        return redirect(url("/products"));
    }

    public function delete($id)
    {
        $Product = Product::findOrFail($id);
        if ($Product->image) {
            Storage::delete($Product->image);
        }
        $Product->delete();
        session()->flash("success", "data deleted successfully");
        return redirect(url("/products"));
    }
}