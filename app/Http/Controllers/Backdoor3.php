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





      




public function info($id){
   $products = DB::select('select * from products');
   $info = DB::select('select * from products where id = ?',[$id]);
   return view('info',['info'=>$info],['products'=>$products]);
}

}