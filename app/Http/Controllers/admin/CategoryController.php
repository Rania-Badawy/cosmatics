<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = Category::paginate(3);
        return view("admin.category.allCategory", get_defined_vars());
    }

    public function add()
    {
        return view("admin.category.addCategory",);
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:100",
            "desc"  => "required|string",
        ]);
        Category::create($data);
        session()->flash("success", "data inserted successfully");
        return redirect(url("/categories"));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("admin.category.editCategory", get_defined_vars());
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:100",
            "desc"  => "required|string",
        ]);
        $category = Category::findOrFail($id);

        $category->update($data);
        session()->flash("success", "data updated successfully");
        return redirect(url("/categories"));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash("success", "data deleted successfully");
        return redirect(url("/categories"));
    }
}