<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Opinion;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    public function home()
    {
        $categories      = Category::all();
        $latest_products = Product::latest()->take(4)->get(); 
        $products_offer  = Product::where('offer','1')->latest()->take(3)->get(); 
        $opinions        = Opinion::all(); 
        return view('user.home', get_defined_vars());
    }
   ////////////////////////////////////
    public function showProducts($id)
    {
        $products = Product::where('category_id',$id)->get();
        return view("user.showProduct", get_defined_vars());
    }
    public function addCart(Request $request)
    {
        $data = $request->validate([
           
            "quantity"     => "required|numeric"
        ]);
        $user_id=Auth::user()->id;
        $product=Product::find($request->product_id);
        Cart::create([
            "user_id"=>$user_id,
            "product_id"=>$request->product_id,
            "quantity"=>$request->quantity
        ]);
        $product->update([
            "quantity_reserved"=>$product->quantity_reserved+$request->quantity
        ]);
        session()->flash("success", "data added successfully");
        return redirect(url("/carts"));
    }
    ////////////////////////////////////
    public function carts()
    {
        $user_id=Auth::user()->id;
        $carts = Cart::where('user_id',$user_id)->paginate(5);
        return view("user.carts", get_defined_vars());
    }
    ////////////////////////////////
    public function editCart(Request $request,$id)
    {
        $cart=Cart::find($id);
        $product=Product::find($cart->product_id);
        $product->update([
            "quantity_reserved"=>($product->quantity_reserved-$cart->quantity)+$request->quantity
        ]);
        $cart->update([
            "quantity"=>$request->quantity
        ]);
        
        session()->flash("success", "data updated successfully");
        return redirect(url("/carts"));
    }
    public function deleteCart($id)
    {
        $cart=Cart::find($id);
        $product=Product::find($cart->product_id);
        $product->update([
            "quantity"=>$cart->product->quantity_reserved-$cart->quantity
        ]);
        $cart->delete();
        session()->flash("success", "data deleted successfully");
        return redirect(url("/carts"));
    }

    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            "name"     => "required",
            "email"    => "required|email",
            "subject"  => "required",
            "message"  => "required"
        ]);
        $recipient = $data['email'];
        $name      = $data['name'];
        $subject   = $data['subject'];
        $message   = $data['message'];
    
        try {
            Mail::to($recipient)->send(new MyMail($name, $subject, $message));
            session()->flash("success", "Email sent successfully");
            return  redirect($_SERVER['HTTP_REFERER']);
        } catch (\Exception $e) {
            session()->flash("errors", ['Failed to send email: ' . $e->getMessage()]);
            return  redirect($_SERVER['HTTP_REFERER']);
        }
   }
}
