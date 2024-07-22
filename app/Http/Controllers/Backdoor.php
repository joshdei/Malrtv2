<?php

namespace App\Http\Controllers;

use App\Models\Orders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\UserVerify;
use App\Models\SellerProductData;
use App\Models\Category; // Import the Category model at the top of your controller
use App\Models\Neworder;
use App\Models\Verifedaccount;
use DB;
use App\Models\telegramlink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use mysqli;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
class Backdoor extends Controller
{

  
public function admin(){
   $products = DB::select('select * from products');
   return view('dashboard',['products'=>$products]);
   }
   


    public function confser(Request $request, $id){
      $checkuser = DB::select('select * from verifedaccounts where usersid = ?',[$id]);
      if ($checkuser){
        $categories = Category::all(); // Retrieve all categories

         return view('post',['categories' => $categories]);
      }else{
         return view('update');
      }
    }




    
  
public function post()
{
    $user = Auth::user();

    if (!$user) {
        return view('auth.register');
    }

    $userId = $user->id;
    $checkuser = Verifedaccount::where('usersid', $userId)->first();

    if ($checkuser) {
        $categories = Category::all(); // Retrieve all categories

         return view('post',['categories' => $categories]);
    } else {
        return view('update');
    }
}
public function upgrade(Request $request) {
    if (auth()->check()) {
        $id = auth()->user()->id;
        $checkUser = DB::select('select * from verifedaccounts where usersid = ?', [$id]);

        if (!empty($checkUser)) {
            return redirect()->route('admin');
        }

        return view('update');
    } else {
        return redirect()->route('admin');
    }
}


public function acct(){
    $products = DB::select('select * from products');
    return view('dashboard',['products'=>$products]);
}


public function verifyAccount(Request $request)
{
    $request->validate([
        'state' => 'required',
        'lga' => 'required',
        'address' => 'required',
        'nin' => 'required',
        'whatsapp' => 'required',
        'usersid' => 'required',
        'image' => 'required|image|max:4000',
        'ninpic' => 'required|image|max:4000',
        
    ]);

    // Check if the user with this ID already has an entry in the database
    $existingEntry = Verifedaccount::where('usersid', $request->input('usersid'))->first();

    if ($existingEntry) {
        return redirect()->back()->with('error', 'You already have an entry in the database.');
    }

    $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    $request->file('image')->move(public_path('passport'), $fileName);

    $ninName = time() . '.' . $request->file('ninpic')->getClientOriginalExtension();
    $request->file('ninpic')->move(public_path('nin'), $ninName);

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

    return redirect()->route('admin')->with('success', 'Verification successful.');
}



public function profile(){
    return redirect()->route('admin');
}

public function createpro(Request $request)
{
    $request->validate([
        'productname' => 'required',
        'newprice' => 'required',
        'oldprice' => 'required',
        'producttype' => 'required',
        'information' => 'required',
        'usersid' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:4000', // Max size is 2MB (2048 KB)
    ]);
    

    $fileName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('product'), $fileName);

  
    $user = new Product;
    $user->productname = $request->input('productname');
    $user->newprice = $request->input('newprice');
    $user->oldprice = $request->input('oldprice');
    $user->producttype = $request->input('producttype');
    $user->information = $request->input('information');
    $user->usersid = $request->input('usersid');
    $user->image = $fileName;
    $user->save();
    
    return Redirect::to('admin');
}


public function orders()
{
    if (auth()->check()) {
        $userId = auth()->user()->id;

        $userOrdersWithProductInfo = DB::table('orders')
            ->join('products', 'orders.productid', '=', 'products.id')
            ->select('products.*', 'orders.product_value as total_orders', 'orders.status')
            ->where('orders.buyid', $userId)
            ->get();

        $totalSum = 0;

        foreach ($userOrdersWithProductInfo as $productData) {
            $totalSum += (floatval($productData->total_orders) * floatval($productData->newprice));
        }

        return view('orders', [
            'userOrdersWithProductInfo' => $userOrdersWithProductInfo,
            'totalSum' => $totalSum,
        ]);
    }

    return view('auth.login'); // Redirect to login page or handle non-authenticated users as needed
}


public function deleteOrder($id)
{
    $userId = auth()->user()->id;

    $order = DB::table('orders')
        ->where('id', $id)
        ->where('buyid', $userId)
        ->first();

    if ($order) {
        DB::table('orders')->where('id', $id)->delete();
        return redirect()->route('orders')->with('success', 'Order deleted successfully.');
    } else {
        return redirect()->route('orders')->with('error', 'Order not found or unauthorized.');
    }
}


public function createorder(Request $request)
{
    $request->validate([
        'sellerid' => 'required',
        'productid' => 'required',
        'product_value' => 'required',
    ]);

    if (auth()->check()) {
        // If the user is authenticated, create the order normally.
        $order = new Orders;
        $order->sellerid = $request->input('sellerid');
        $order->product_value = $request->input('product_value');
        $order->productid = $request->input('productid');
        $order->buyid = auth()->user()->id;
        $order->save();

        return redirect()->route('admin')->with('success', 'Order created successfully.');
    } else {
        return redirect()->route('new-order', [
            'productid' => $request->input('productid'),
            'product_value' => $request->input('product_value'),
        ]);
        
    }
}

public function newOrder($productid, $product_value)
{
    // Convert $productid to an array if it's a single ID
    $productIds = is_array($productid) ? $productid : [$productid];

    $selectedProductInfo = Product::whereIn('id', $productIds)->get();

    return view('newOrder', ['product_value' => $product_value, 'selectedProductInfo' => $selectedProductInfo]);
}


public function storeOrder(Request $request)
{
    $order = new Neworder;
    $order->product_value = $request->input('product_value');
    $order->fname = $request->input('fname');
    $order->lname = $request->input('lname');
    $order->country = $request->input('country');
    $order->billing_address = $request->input('billing_address');
    $order->city = $request->input('city');
    $order->state = $request->input('state');
    $order->phone = $request->input('phone');
    $order->email = $request->input('email');
    $order->products_id = $request->input('products_id');
    $order->products_newprice = $request->input('products_newprice');

    $order->save();

    return redirect()->route('success'); // Redirect to a success page
}


public function success(){
    return view('success');
}
public function viewBuyersOrders2()
{
    if (auth()->check()) {
        $sellerId = auth()->user()->id;

        $buyerOrders = DB::table('neworders')
            ->join('products', 'neworders.products_id', '=', 'products.id')
            ->select(
                'neworders.product_value',
                'neworders.fname',
                'neworders.lname',
                'neworders.country',
                'neworders.billing_address',
                'neworders.city',
                'neworders.state',
                'neworders.phone',
                'neworders.email',
                'neworders.created_at',
                'neworders.products_id',
                'neworders.products_newprice',
                'products.productname',
                'products.newprice as product_price',
                'products.oldprice',
                'products.producttype',
                'products.information',
                'products.image',
                'products.usersid'
            )
            ->where('products.usersid', $sellerId)
            ->orderBy('neworders.created_at', 'desc')
            ->get();

        return view('viewBuyersOrders2', ['buyerOrders' => $buyerOrders]);
    }

    return view('auth.login');
}


public function storeSellerProductData(Request $request)
{
    $request->validate([
        'seller_id' => 'required',
        'buyer_id' => 'required',
        'product_id' => 'required',
        'total_orders' => 'required',
        'grand_total' => 'required',
        // Add more validation rules as needed
    ]);

    $data = $request->only([
        'seller_id',
        'buyer_id',
        'product_id',
        'total_orders',
        'grand_total',
        // Add more fields as needed
    ]);

    $sellerProductData = new SellerProductData;
    $sellerProductData->fill($data);
    $sellerProductData->save();

    // Send notifications to the seller and the buyer
    $seller = SellerProductData::find($request->input('seller_id')); // Assuming you have a Seller model
    $buyer = SellerProductData::find($request->input('buyer_id')); // Assuming you have a Buyer model

    if ($seller) {
        $orderId = $sellerProductData->id; // Assuming you have an ID for the order
        $seller->notify(new NewOrderNotification($orderId));
    }

    if ($buyer) {
        $orderId = $sellerProductData->id; // Assuming you have an ID for the order
        $buyer->notify(new NewOrderNotification($orderId));
    }

    return redirect()->route('admin')->with('success', 'Product data stored and notifications sent.');
}
   
   
public function info($id)
{
    $allProducts = DB::table('products')->get();
    $selectedProductInfo = DB::table('products')->where('id', $id)->first();

    $relatedProducts = DB::table('products')
        ->where('id', $id)
        ->where('producttype', $selectedProductInfo->producttype)
        ->inRandomOrder()
        ->limit(4)
        ->get();

    $newProducts = Product::orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        return view('info', [
            'selectedProductInfo' => $selectedProductInfo,
            'allProducts' => $allProducts,
            'relatedProducts' => $relatedProducts,
            'newProducts' => $newProducts
        ]);
        
}








public function viewBuyerInfo($buyerId)
{
    $buyerInfo = DB::table('users')
        ->where('id', $buyerId)
        ->first();

    if ($buyerInfo) {
        $buyerOrders = DB::table('orders')
            ->join('products', 'orders.productid', '=', 'products.id')
            ->select('products.productname', 'orders.product_value', 'orders.created_at')
            ->where('orders.buyid', $buyerId)
            ->where('products.usersid', auth()->user()->id) // Assuming the seller ID is used to identify the seller
            ->get();

        return view('buyer_info', [
            'buyerInfo' => $buyerInfo,
            'buyerOrders' => $buyerOrders,
        ]);
    }

    return redirect()->back()->with('error', 'Buyer not found.');
}


public function viewBuyersOrders()
{
    if (auth()->check()) {

        $sellerId = auth()->user()->id;
    

        $buyerOrders = DB::table('orders')
    ->join('products', 'orders.productid', '=', 'products.id')
    ->join('users', 'orders.buyid', '=', 'users.id')
    ->select(
        'users.name as buyer_name',
        'users.tel',
        'products.productname',
        'products.image',
        'products.id',
        'products.newprice as product_price',
        'orders.product_value',
        'orders.created_at',
        'orders.status' // Make sure 'status' is selected here
    )
    ->where('products.usersid', $sellerId)
    ->orderBy('orders.created_at', 'desc')
    ->get();

        return view('seller_buyers_orders', ['buyerOrders' => $buyerOrders]);
        
    }

    return view('auth.login'); // Redirect to login page or handle non-authenticated users as needed


}


public function searchAndFilter(Request $request)
{
    $searchQuery = $request->input('search');
    $query = Product::query();
    if ($searchQuery) {
        $query->where('productname', 'like', '%' . $searchQuery . '%');
    }
    $relatedProducts = DB::table('products')
         ->where('productname', $searchQuery)
         ->inRandomOrder()
         ->limit(4)
         ->get();
         $newProducts = Product::orderBy('created_at', 'desc')
         ->limit(10) // You can adjust the limit as needed
         ->get();
    $searchResults = $query->get();
    return view('product_list', [
        'searchResults' => $searchResults,
        'searchQuery' => $searchQuery,
        'relatedProducts' => $relatedProducts,
        'newProducts' => $newProducts
    ]);

}




     public function recommendations()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve user's purchase history or browsing history (for example)
        // You can adjust this logic based on your application's structure
        $userHistory = $user->orders()->pluck('product_id')->toArray();

        // Retrieve recommended products based on user history
        $recommendedProducts = Product::whereIn('id', $userHistory)
            ->inRandomOrder()
            ->limit(4) // You can adjust the number of recommended products
            ->get();

        return view('product_recommendations', [
            'recommendedProducts' => $recommendedProducts,
        ]);
    }

    public function showProducts( $category)
    {
        $productTypes = Product::where('producttype', $category)->get();
    
        if ($productTypes->isEmpty()) {
            return redirect()->route('admin');
        }
    
        return view('cat', ['productTypes' => $productTypes, 'category' => $category]);
    }
    

    public function newProducts()
    {
        // Retrieve the new products ordered by their creation timestamp
        $newProducts = Product::orderBy('created_at', 'desc')
            ->limit(10) // You can adjust the limit as needed
            ->get();

        // Load the 'newProducts' view and pass the data to it
        return view('newProducts', ['newProducts' => $newProducts]);
    }



    
    public function updateOrderStatus(Request $request, $id)
    {
        
            $order = Orders::find($id);
            $order->status = $request->input('status');
            $order->save();
    
            return redirect()->back()->with('success', 'Order status updated');
        
    }
    
    public function myproducts(){
        $id = auth()->user()->id;
        $myproducts = DB::select('select * from products where usersid = ?',[$id]);
        
        if ($myproducts){
           return view('myproducts',['myproducts' => $myproducts]);
        } else {
           
            return redirect()->route('admin');
        }
    }
    

}



