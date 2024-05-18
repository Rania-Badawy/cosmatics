<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function edit()
    {
        $contact = Contact::first();
        return view("admin.contact.editContact", get_defined_vars());
    }

    public function update( Request $request)
    {
        $data = $request->validate([
            "address"    => "required|string",
            "phone"      => "required",
            "whatsapp"   => "required",
            "email"      => "required|email",
        ]);
        $data['twitter']     = $request->twitter;
        $data['facebook']    = $request->facebook;
        $data['instagram']   = $request->instagram;
        $data['youtube']     = $request->youtube;
        $data['snapchat']    = $request->snapchat;
        $data['google_plus'] = $request->google_plus;
        $data['map']         = $request->map;
        $contact = Contact::first();

        $contact->update($data);
        session()->flash("success", "data updated successfully");
        return redirect(url("/contacts/edit"));
    }
}
