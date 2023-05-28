<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //


public function view_category()
{
  $data=category::all(); 
  $count = Product::where('quantity', '<', 5)->count();
    return view('admin.category',compact('data','count'));
}

public function add_category(Request $request)
{
    
    $data=new category;
    $data->category_name=$request->category;
    $image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('category',$imagename);
$data->image=$imagename;


   $data->save();

return redirect()->back()->with('message','category added succesfully');


}

public function delete_category($id){

$data=category::find($id);
$data->delete();
return redirect()->back()->with('message','Category deleted successfully'); 

}


 



 public function view_product(){
  $count = Product::where('quantity', '<', 5)->count();
  $data=category::all(); 
return view('admin.product',compact('data','count'));
 }

public function add_product(Request $request){
 
$product=new product;
$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->quantity=$request->quantity;
$product->discount_price=$request->discount_price;
$product->category=$request->category;

$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('product',$imagename);
$product->image=$imagename;




$product->save();
return redirect()->back()->with('message','produit ajouter avec succes');





}


public function show_product(){
  $count = Product::where('quantity', '<', 5)->count();
$data=product::all();
return view('admin.show_product',compact('data','count'));



}

public function delete_product($id){

  $data=product::find($id);
  $data->delete();
  return redirect()->back()->with('message','product deleted successfully'); 
  


}
 public function update_product($id){

$product=product::find($id);
$category=category::all();
return view('admin.update_product',compact('product','category'));

 }

public function update_product_confirm(Request $request, $id){



$product=product::find($id);
$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->discount_price=$request->discount_price;
$product->category=$request->category;
$product->quantity=$request->quantity;
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('product',$imagename);
$product->image=$imagename;

$product->save();
return redirect('/show_product')->with('message','product updated successfully'); 

}


 
  
public function getAllMessagesAndEmails()
{
    $contacts = DB::table('contacts')->select('message', 'user_id','status','id')->get();
    $result = array();
    foreach($contacts as $contact) {
        $user = DB::table('users')->select('email')->where('id', $contact->user_id)->first();
        $result[] = array(
            'message' => $contact->message,
            'email' => $user->email,
            'status' => $contact->status,
            'id'=>$contact->id
        );
    }
    return $result;
}
public function show_message()
{ $count = Product::where('quantity', '<', 5)->count();
    $messages = $this->getAllMessagesAndEmails();
    return view('admin.show_message', compact('messages','count'));
}

 public function order(){
  $count = Product::where('quantity', '<', 5)->count();
$order=order::all();
return view('admin.order',compact('order','count'));



 }   
 public function subscribe(){
  $count = Product::where('quantity', '<', 5)->count();
$subscribe=subscribe::all();
return view('admin.subscribe',compact('subscribe','count'));


 }
  
 public function confirme($id) {
    $subscribe = subscribe::find($id);
 
    if ($subscribe) {
       $to_email = $subscribe->email;
       $subject = 'bijouterie fadoua';
       $mssg = "you will receive our new offers welcome to our website";
       if (filter_var($to_email, FILTER_VALIDATE_EMAIL)){
       mail($to_email, $subject, $mssg);
       
       $subscribe->status=1;
       $subscribe->save();
       return redirect()->back()->with('message','confirmation successfully');

  }  } else {
        return redirect()->back()->with('message',' unsuccessfull');
    }
 }
  
  
  public function show($id){


$contact=Contact::find($id);

$contact->status=1;
$contact->save();
$count = Product::where('quantity', '<', 5)->count();
return view('admin.show',compact('contact','count'));


  }


  public function alert()
{
    $prods = DB::table('products')
    ->select('*')
    ->where('quantity', '<', 5)
    ->get();
   
    $count = Product::where('quantity', '<', 5)->count();
 
        
    

    return view('admin.alert', compact('prods','count'));
}


public function send($id,Request $request){
  $contact=Contact::find($id);
  $userId=$contact->user_id;
 
  $user=user::find($userId); 
  $email=$user->email;


    $subject='response to your comment ';
    $mail=$email;
    $mssg=$request->reponse;
    if( mail($mail, $subject, $mssg)){
        mail($mail, $subject, $mssg);
        $contact->delete();
        
    } $count = Product::where('quantity', '<', 5)->count();
   
    $messages = $this->getAllMessagesAndEmails();
return view('admin.show_message',compact('messages','count'));


}

public function done($id){

$order=order::find($id);

$order->delete();

return redirect()->back();

}

public function redirect(){
  $category=category::all();
  $usertype=Auth::user()->usertype;
  $count = Product::where('quantity', '<', 5)->count();
  $product = DB::select("SELECT * FROM products WHERE category = 'cadeau'");

  if($usertype=='1'){

     return view("admin.home",compact('count'));
  }
  if($usertype=='0'){
    $user_id=Auth::user()->user_id;
    $count = DB::table('carts')
    ->where('user_id', $user_id)
    ->count();
    return view('home.userpage',compact('category','product','count'));
    
    }
 
  
}


}




