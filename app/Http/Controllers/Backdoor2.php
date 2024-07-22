<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Backdoor2 extends Controller
{
    
    public function editelegramlinkss(Request $request,$id) {
        $name = $request->input('telegramlink');
        DB::update('update telegramlinks set telegramlink = ? where id = ?',[$name,$id]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/admin">Click Here</a> to go back.';
     }


     public function editelegramlinks($id){
        $links = DB::select('select * from telegramlinks where id = ?',[$id]);
        return view('edittelegram',['links'=>$links]);
     }



       
   public function telegramlink(Request $request){
    return view('telegramlink');
      
}
public function createtelegramlink(Request $request){
$telegramlink = $request->input('telegramlink');
$data=array("telegramlink"=>$telegramlink);
DB::table('telegramlinks')->insert($data);
echo "Record inserted successfully.<br/>";
echo '<a href = "/dashboard">Click Here</a> to go back.'; 
  
}




public function twitterlink(){
    return view('twitterlink');
}

public function createtwitterlink(Request $request){
$twitterlink = $request->input('twitterlink');
$data=array("twitterlinks"=>$twitterlink);
DB::table('twitterlinks')->insert($data);
echo "Record inserted successfully.<br/>";
echo '<a href = "/dashboard">Click Here</a> to go back.'; 
}

public function changesupertelegramlink(){
return view('changesupertelegramlink');
}
public function createsupertelegramlink(Request $request){
$supertelegramlink = $request->input('supertelegramlink');
$data=array("supertelegramlinks"=>$supertelegramlink);
DB::table('supertelegramlinks')->insert($data);
echo "Record inserted successfully.<br/>";
echo '<a href = "/dashboard">Click Here</a> to go back.'; 
}

public function changemixertelegram(){
return view('changemixertelegram');
}

public function mixertelegramlink(Request $request){
$mixertelegramlink = $request->input('mixertelegramlink');
$data=array("mixertelegramlinks"=>$mixertelegramlink);
DB::table('mixertelegramlinks')->insert($data);
echo "Record inserted successfully.<br/>";
echo '<a href = "/dashboard">Click Here</a> to go back.'; 
}


public function admin(){
$telegramlinks = DB::select('select * from telegramlinks');
$mixertelegramlinks = DB::select('select * from mixertelegramlinks');
$supertelegramlinks = DB::select('select * from supertelegramlinks');
$twitterlinks = DB::select('select * from twitterlinks');
return view('dashboard',['telegramlinks'=>$telegramlinks],['mixertelegramlinks'=>$mixertelegramlinks],['supertelegramlinks'=>$supertelegramlinks],['twitterlinks'=>$twitterlinks]);
}





public function destroytelegramlinks($id) {
DB::delete('delete from telegramlinks where id = ?',[$id]);
echo "Record deleted successfully.
";
echo '<a href = "/admin">Click Here</a> to go back.';
}


public function upgradeacct(Request $request){
    $request->validate([
        'state' => 'required',
        'lga' => 'required',
        'address' => 'required',
        'nin' => 'required',
        'usersid' => 'required',
        'image' => 'required'
    ]);

    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('passport'), $fileName);
    
    $user = new Verifedaccount;
    $user->state = $request->input('state');
    $user->lga = $request->input('lga');
    $user->address = $request->input('address');
    $user->nin = $request->input('nin');
    $user->usersid = $request->input('usersid');
    $user->profile_pic = $fileName;
    $user->save();
   
    return view('update');


}

}



<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\UserVerify;

use App\Models\Verifedaccount;
use DB;
use App\Models\telegramlink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class Backdoor extends Controller
{

  
public function admin(){
   $products = DB::select('select * from products');
   return view('dashboard',['products'=>$products]);
   }
   


    public function confser(Request $request, $id){
      $checkuser = DB::select('select * from verifedaccounts where usersid = ?',[$id]);
      if ($checkuser){
         return view('post');
      }else{
         return view('update');
      }
    }




    
public function post(){
   $id = auth()->user();
   if ($id == ""){
      return view('auth.register');
   }else{
      $id = auth()->user()->id;
      $checkuser = DB::select('select * from verifedaccounts where usersid = ?',[$id]);
      if ($checkuser){
         return view('post');
      }else{
         return view('update'); 
      }
   }
 
}

public function upgrade(Request $request ){
  
      return view('update'); 
   

}


public function acct(){
   return view('dashboard');
}
public function upgradeacct(Request $request){
   $request->validate([
       'state' => 'required',
       'lga' => 'required',
       'address' => 'required',
       'nin' => 'required',
       'whatsapp' => 'required',
       'usersid' => 'required',
       'image' => 'required',
       'ninpic' => 'required',

   ]);

   $fileName = time() . '.' . $request->image->extension();
   $request->image->move(public_path('passport'), $fileName);
   
   $ninName = time() . '.' . $request->ninpic->extension();
   $request->ninpic->move(public_path('nin'), $ninName);
   

   $user = new Verifedaccount;
   $user->whatsapp = $request->input('whatsapp');
   $user->state = $request->input('state');
   $user->lga = $request->input('lga');
   $user->address = $request->input('address');
   $user->nin = $request->input('nin');
   $user->usersid = $request->input('usersid');
   $user->profile_pic = $fileName;
   $user->ninpic = $ninName;
   $user->save();
  
   return view('dashboard');


}


public function createpro(Request $request){
   $request->validate([
      'productname' => 'required',
      'newprice' => 'required',
      'oldprice' => 'required',
      'producttype' => 'required',
      'information' => 'required',
      'usersid' => 'required',
      'image' => 'required',
      'provideo' => 'required',

  ]);

  $fileName = time() . '.' . $request->image->extension();
  $request->image->move(public_path('product'), $fileName);
  
  $ninName = time() . '.' . $request->provideo->extension();
  $request->provideo->move(public_path('provideo'), $ninName);
  

  $user = new Product;
  $user->productname = $request->input('productname');
  $user->newprice = $request->input('newprice');
  $user->oldprice = $request->input('oldprice');
  $user->producttype = $request->input('producttype');
  $user->information = $request->input('information');
  $user->usersid = $request->input('usersid');
  $user->image = $fileName;
  $user->provideo = $ninName;
  $user->save();
  return Redirect::to('admin');
 
}




   public function orders(){
      $id  =  auth()->user()->id;
      $checkorder= DB::select('select * from verifedaccounts where usersid = ?',[$id]);
      return view('orders',['products'=>$checkorder]);
   }

   public function createorder(Request $request){
      $request->validate([
         'sellerid' => 'required',
         'productid' => 'required',
         'product_value' => 'required',
      ]);

      $user = new Orders;
      $user->sellerid = $request->input('sellerid');
      $user->product_value=$request->input('product_value');
      $user->productid = $request->input('productid');
      $user->buyid  =  auth()->user()->id;
      $user->save();
      return Redirect::to('admin');
   
   
   }




   public function createorder(Request $request)
{
    // Add middleware to check if the user is authenticated
    $this->middleware('auth');

    $request->validate([
        'sellerid' => 'required',
        'productid' => 'required',
        'product_value' => 'required',
    ]);

    // Check if the user is authenticated before creating the order
    if (auth()->check()) {
        $order = new Orders;
        $order->sellerid = $request->input('sellerid');
        $order->product_value = $request->input('product_value');
        $order->productid = $request->input('productid');
        $order->buyid = auth()->user()->id;
        $order->save();

        return Redirect::route('admin')->with('success', 'Order created successfully.');
    } else {
        return Redirect::route('login')->with('error', 'You must be authenticated to create an order.');
    }
}



      




public function info($id){
   $products = DB::select('select * from products');
   $info = DB::select('select * from products where id = ?',[$id]);
   return view('info',['info'=>$info],['products'=>$products]);
}

}