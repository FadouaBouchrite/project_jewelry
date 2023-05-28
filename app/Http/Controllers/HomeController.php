<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Contact;
use App\Models\order;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Stripe;


class HomeController extends Controller
{
    //

public function index(){
    $product = DB::select("SELECT * FROM products WHERE category = 'cadeau'");

$category=category::all();
return view('home.userpage',compact('category','product'));

// $product=Product::paginate(3);

//     return view('home.userpage',compact('product'));
}


public function redirect(){
$category=category::all();
$usertype=Auth::user()->usertype;
$product = DB::select("SELECT * FROM products WHERE category = 'cadeau'");

if($usertype=='1'){
    $count = Product::where('quantity', '<', 5)->count();
return view('admin.home',compact('count'));


}
if($usertype=='0'){
    $user_id=Auth::user()->user_id;
    $count = DB::table('carts')
    ->where('user_id', $user_id)
    ->count();
return view('home.userpage',compact('category','product'));

}



}
public function product ($category_name){


    $category = Category::where('category_name', $category_name)->firstOrFail();
    $product = Product::where('category', $category->category_name)->get();

$category=$category->category_name;

    // $product=product::find($category_name);
    return view('home.product',compact('product','category'));


}
public function product_details($id){

$product=product::find($id);
return view('home.product_details',compact('product'));

}

public function add_cart(Request $request,$id){

if(Auth::id()){

$user=Auth::user();
$product=product::find($id);
$cart=new cart;
$cart->name=$user->name;
$cart->email=$user->email;

$cart->phone=$user->phone;
$cart->address=$user->address;
$cart->user_id=$user->id;

$cart->product_title=$product->title;
$cart->product_id=$product->id;
if($product->discount_price){

    $cart->price=$product->discount_price * $request->quantity;   
}else{
$cart->price=$product->price * $request->quantity;

}

$cart->image=$product->image;
$cart->quantity=$request->quantity;

$q=$product->quantity;

$q=$q-$request->quantity;

$product->quantity=$q;
$product->save();


$cart->save(); 

return redirect()->back();

}else{
return redirect('login');
 

}


    


}
public function show_cart(){

if(Auth::id()){
$id=Auth::user()->id;
    $cart=Cart::where('user_id','=',$id)->get();
return view('home.showcart',compact('cart'));

} else{
    return redirect('login');
}


}



public function remove_cart($id){


$cart=cart::find($id);

$cart->delete();
return redirect()->back();
}


public function cash_order(){

$user=Auth::user();
$userid=$user->id;
$data=cart::where('user_id','=',$userid)->get();

foreach($data as $data){

$order=new order;

$order->name=$data->name;
$order->email=$data->email;

$order->address=$data->address;
$order->user_id=$data->user_id;
$order->product_title=$data->product_title;
$order->price=$data->price;
$order->phone=$data->phone;
$order->quantity=$data->quantity;
$order->image=$data->image;
$order->product_id=$data->product_id;
$order->payment_status='cash on delivery';
$order->delivery_status='processing';
$order->save();
$product=product::find($data->product_id);
$q=$product->quantity;
$q=$q-$data->quantity;
$product->quantity=$q;
$product->save();
$cart_id=$data->id;
$cart=cart::find($cart_id); 
$cart->delete();
}
  
return redirect()->back()->with('message','we received your delevery we will connect u soon');
 
}


public function stripe($totalprice){




    return view('home.stripe',compact('totalprice'));
}


public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);


        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
        
        $order=new order;
        
        $order->name=$data->name;
        $order->email=$data->email;
        
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->phone=$data->phone;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
        $order->payment_status='paid';
        $order->delivery_status='processing';
        $order->save();
        $product=product::find($data->product_id);
$q=$product->quantity;
$q=$q-$data->quantity;
$product->quantity=$q;
$product->save();
        $cart_id=$data->id;
        $cart=cart::find($cart_id); 
        $cart->delete();
        }





        Session::flash('success', 'Payment successful!');
              
        return back();
    }


public function show_categorie(){
    $category=category::all();

    return view('home.category',compact('category'));
    
}
public function contact(){

return view('home.contact');

}
public function add_message(Request $request){
    if(Auth::id()){

    
    $user=Auth::user();
    
$contact=new Contact;
$contact->message=$request->message;
$contact->user_id=$user->id;
$contact->status=$request->stat;
$contact->save();

return redirect()->back()->with('message','comment sent successfully');
    }else{


        return redirect('login');

    }
}

public function subscribe(Request $request){


$subscribe=new Subscribe;
$subscribe->email=$request->email;
$subscribe->save();

return redirect()->back();
}

public function cadeau(){



    $product = DB::select("SELECT * FROM products WHERE category = 'cadeau'");

return view('home.cadeau',compact('product'));
}

public function search($category,Request $request){
    $category=$category;
$search=$request->product;

    $product = DB::table('products')
    ->where('category', '=', $category)
    ->where('title', 'like', "%$search%")
    ->orWhere('description', 'like',"%$search%" )
    ->orWhere('price', 'like',"%$search%" )
    ->orWhere('discount_price', 'like',"%$search%" )
    ->get();
    return view('home.product',compact('product','category'));

}
public function nombre(){


   



}

}
