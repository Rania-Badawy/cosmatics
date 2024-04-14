<?php

namespace App\Http\Controllers\admin;

use App\Models\Opinion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OpinionController extends Controller
{
    public function all()
    {
        $opinions = Opinion::paginate(5);
        return view('admin.opinion.allOpinion', get_defined_vars());
    }
    ///////////////////////////////
    public function show($id)
    {
        $opinion = Opinion::findOrFail($id);
        return view("admin.opinion.showOpinion", get_defined_vars());
    }
    /////////////////////////////////
    public function add()
    {
        return view("admin.opinion.addOpinion");
    }
    /////////////////////////
    public function insert(Request $request)
    {
        $data = $request->validate([
            "name"         => "required|string|max:100",
            "desc"         => "required|string",
            "image"        => "required|image|mimes:png,jpg,jpeg,gif",
        ]);
        $data['image'] = Storage::putFile('opinion', $data['image']);
        Opinion::create($data);
        session()->flash("success", "data inserted successfully");
        return redirect(url("/opinions"));
    }

    public function edit($id)
    {
        $opinion = Opinion::findOrFail($id);
        return view("admin.opinion.editOpinion", get_defined_vars());
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            "name"         => "required|string|max:100",
            "desc"         => "required|string",
            "image"        => "image|mimes:png,jpg,jpeg,gif",
        ]);
        $opinion = Opinion::findOrFail($id);
        if ($request->hasFile("image")) {
            if ($opinion->image) {
                Storage::delete($opinion->image);
            }
            $data['image'] = Storage::putFile('opinion', $data['image']);
        }
        $opinion->update($data);
        session()->flash("success", "data updated successfully");
        return redirect(url("/opinions"));
    }

    public function delete($id)
    {
        $Opinion = Opinion::findOrFail($id);
        if ($Opinion->image) {
            Storage::delete($Opinion->image);
        }
        $Opinion->delete();
        session()->flash("success", "data deleted successfully");
        return redirect(url("/opinions"));
    }
}