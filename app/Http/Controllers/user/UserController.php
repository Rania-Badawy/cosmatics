<?php

namespace App\Http\Controllers\user;

use App\Mail\MyMail;
use App\Models\Cart;
use App\Models\Email;
use App\Models\Opinion;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
 ////////////////////////////////
 public function confirmOrder(Request $request,$id)
 {
     $cart=Cart::find($id);
     $product=Product::find($cart->product_id);
     $product->update([
         "quantity_sold"=>($product->quantity_sold+$cart->quantity)
     ]);
     $cart->update([
         "confirmed"=>"1"
     ]);
     
     session()->flash("success", "data updated successfully");
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
        $recipient   = $data['email'];
        $name        = $data['name'];
        $subject     = $data['subject'];
        $message     = $data['message'];
        $emailRecord = Email::where('email', $recipient)->first();
        $check_chat  = optional($emailRecord)->chat;
        if($request->chat){
        $chat      =$request->chat;
        }elseif($check_chat){
            $chat      =$check_chat;
        }
        else{

            $chat_num = Email::selectRaw('MAX(chat) as max_chat')->first();
            $chat     = $chat_num->max_chat + 1;
        }
        try {
            Mail::to($recipient)->send(new MyMail($name, $subject, $message));
            Email::create([
                "name"    =>$name,
                "email"   =>$recipient,
                "subject" =>$subject,
                "message" =>$message,
                "chat"    =>$chat
            ]);
            session()->flash("success", "Email sent successfully");
            
        } catch (\Exception $e) {
            session()->flash("errors", ['Failed to send email: ' . $e->getMessage()]);
          
        }
        session()->flash('formData', $data);
        return redirect()->back();

        // return  redirect($_SERVER['HTTP_REFERER']);

   }
}
