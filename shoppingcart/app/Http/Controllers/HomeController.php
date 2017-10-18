<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Billing;
use App\ProductPrice;
use App\CartItem;
use App\ProductStock;
use App\Order;
use App\OrderItem;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('home',compact('products'));
    }

    public function addtocart(Request $request,$id)
    {
       $userid=Auth::id();
       $carts = Cart::
       where('customer_id','=',$userid)
       ->where('is_cancelled','=',0)
        ->where('is_checkout','=',0)
        ->where('is_abandoned','=',0)
        ->count();

        if($carts == 0)
        {

            $cart = new Cart;
           $cart->customer_id = $userid;
         $cart->save();

         $cart_ids = Cart::where('customer_id','=',$userid)
                ->where('is_cancelled','=',0)
                ->where('is_checkout','=',0)
                ->where('is_abandoned','=',0)
                ->get()
                ->first();
        $cart_id=$cart_ids->id;

        $product_id = $id;
        $quantity = $request-> quantity;
        $amountget = $request-> description;
        $amounts = ProductPrice::where('description','=',$amountget)->get()->first();
        $amount = $amounts->price;
        $producttype = $amounts->description;
        $barcodes= Product::find($id);
        $barcode=$barcodes->barcode;




        $cartitems = new CartItem;

        $cartitems->cart_id = $cart_id;
        $cartitems->product_id = $product_id;
        $cartitems->product_type = $producttype;
        $cartitems->quantity = $quantity;
        $cartitems->amount = $amount*$quantity;
        $cartitems->barcode = $barcode;
        $cartitems->save();

for ($i=0; $i <$quantity ; $i++) { 
        $stock = ProductStock::
        where('product_id','=',$id)
        ->where('on_cart','=',0)
        ->get()
        ->first();
        $stock->on_cart = 1;
        $stock->save();
            }


        }
        else
        {

         $cart_ids = Cart::where('customer_id','=',$userid)
                ->where('is_cancelled','=',0)
                ->where('is_checkout','=',0)
                ->where('is_abandoned','=',0)
                ->get()
                ->first();
        $cart_id=$cart_ids->id;

                    $product_id = $id;
        $quantity = $request-> quantity;
        $amountget = $request-> description;
        $amounts = ProductPrice::where('description','=',$amountget)->get()->first();
        $amount = $amounts->price;
        $producttype = $amounts->description;
        $barcodes= Product::find($id);
        $barcode=$barcodes->barcode;


        $oncart = CartItem::where('product_id','=',$id)
        ->where('product_type','=',$producttype)
        ->count();



        if($oncart == 0)
        {
                    $cartitems = new CartItem;

        $cartitems->cart_id = $cart_id;
        $cartitems->product_id = $product_id;
        $cartitems->product_type  = $producttype;
        $cartitems->quantity = $quantity;
        $cartitems->amount = $amount*$quantity;
        $cartitems->barcode = $barcode;
        $cartitems->save();

 

for ($i=0; $i <$quantity ; $i++) { 
        $stock = ProductStock::
        where('product_id','=',$id)
        ->where('on_cart','=',0)
        ->get()
        ->first();
        $stock->on_cart = 1;
        $stock->save();
            }
        }
        else
        {
            $currentquan = CartItem::where('product_id','=',$id)
            ->get()
            ->first();
            $currentamt = CartItem::where('product_id','=',$id)
            ->get()
            ->first();
            $quan = $currentquan->quantity;
            $amt = $currentamt->amount;

            $newquan = $quan+$quantity;
            $newamt = $amt+($amount*$quantity);
            
     $update = CartItem::where('product_id','=',$id)
     ->where('product_type','=',$producttype)
     ->update(['amount' => $newamt,'quantity' => $newquan]);

  for ($i=0; $i <$quantity ; $i++) { 
        $stock = ProductStock::
        where('product_id','=',$id)
        ->where('on_cart','=',0)
        ->get()
        ->first();
        $stock->on_cart = 1;
        $stock->save();
            }
            
        }

        }



            \Session::flash('flash_message','the product is added to cart');
            return redirect('home');

    }

        public function product($id)
        {

            $product=Product::find($id);
            $prices=ProductPrice::
            where('product_id','=',$id)->get();
            $stock=ProductStock::
            where('product_id','=',$id)
            ->where('on_cart','=',0)
            ->count();

            if($stock <1)
            {
                $enabled='disabled';
            }
            else
            {
                $enabled='enabled';
            }
            
            return view('product',compact('prices','product','stock','enabled'));
        }
        
        public function cartitems()
        {
            $userid=Auth::id();


                $activecart = Cart::where('customer_id','=',$userid)
                ->where('is_cancelled','=',0)
                ->where('is_checkout','=',0)
                ->where('is_abandoned','=',0)
                ->count();

                if($activecart == 0)
                {
                    \Session::flash('flash_message','You do not have any items in your cart');
                    return redirect('home');
                }
                else
                {
                $cart_ids = Cart::where('customer_id','=',$userid)
                ->where('is_cancelled','=',0)
                ->where('is_checkout','=',0)
                ->where('is_abandoned','=',0)
                ->get()
                ->first();

                $cart_id= $cart_ids->id;



            $cartitems = Product::
            join('cart_items','cart_items.product_id','=','products.id')
            ->where('cart_id','=',$cart_id)
            ->where('deleted_at','=',null)
              ->get();

            $total = CartItem::where('cart_id','=',$cart_id)
            ->sum('amount');

        return view('cartitems',compact('cartitems','total'));
                }



        }

        public function removeproduct($id)
        {
            $item = CartItem::find($id);
            $productid = $item->product_id;
            $quantity = $item->quantity;

        for ($i=0; $i <$quantity ; $i++) { 
                $stock = ProductStock::
                where('product_id','=',$productid)
                ->where('on_cart','=',1)
                ->get()
                ->first();
                $stock->on_cart = 0;
                $stock->save();
                    }


                    $delete = CartItem::find($id);
                    $delete->delete();

                    \Session::flash('flash_message','the product is removed from your cart');
                    return redirect('cartitems');

        }

        public function addbillinginfo()
        {
            $userid = Auth::id();

            $order = Order::where('customer_id','=',$userid)
            ->where('is_active','=',0)
            ->count();

            if($order > 0 )
            {
                \Session::flash('flash_message','you still have an active order, to be able to checkout, pay your current order first');
                    return redirect('cartitems'); 
            }
            else
            {
                \Session::flash('flash_message','Dear Customers, this website currently does not support payments through paypal and other online or electronic payments, thank you for your understanding!');
                return view('billinginfo');
            }
        }

        public function savebillinginfo(Request $request)
        {
            $userid=Auth::id();
            $first_name = $request-> firstname;
            $last_name = $request-> lastname;
            $address = $request-> address;
            $phonenumber = $request-> phonenumber;
            $email = $request-> email;
            $substitute_recepient = $request-> substitute_recepient;

            $billinginfo = new Billing;

            $billinginfo->user_id = $userid;
            $billinginfo->first_name = $first_name;
            $billinginfo->last_name = $last_name;
            $billinginfo->address = $address;
            $billinginfo->phone_number = $phonenumber;
            $billinginfo->email = $email;
            $billinginfo->substitute_recepient = $substitute_recepient;
            $billinginfo->save();

            $billing_ids = Billing::where('user_id','=',$userid)
            ->where('is_active','=',0)
                ->get()
                ->first();
            $billing_id = $billing_ids->id;

                     $cart_ids = Cart::where('customer_id','=',$userid)
                ->where('is_cancelled','=',0)
                ->where('is_checkout','=',0)
                ->where('is_abandoned','=',0)
                ->get()
                ->first();

            $cart_id = $cart_ids->id;
            $amount = CartItem::where('cart_id','=',$cart_id)
            ->sum('amount');
            $total = CartItem::where('cart_id','=',$cart_id)
            ->sum('quantity');
            $order = new Order;

            $order->customer_id = $userid;
            $order->billing_id = $billing_id;
            $order->cart_id = $cart_id;
            $order->amount = $amount;
            $order->total_items = $total;
            $order->save();


            $order_ids = Order::where('customer_id','=',$userid)
            ->where('is_active','=',0)
            ->get()
            ->first();
            $order_id = $order_ids->id;


            $cartitems = CartItem::where('deleted_at','=',null)
            ->get();


            foreach($cartitems as $cartitem)
            {
                $orderitems = new OrderItem;
                $orderitems->order_id = $order_id;
                $orderitems->product_id = $cartitem->product_id;
                $orderitems->product_type = $cartitem->product_type;
                $baseprice = $cartitem->amount / $cartitem->quantity;
                $orderitems->amount = $baseprice;
                $orderitems->quantity = $cartitem->quantity;
                $orderitems->price = $cartitem->amount;
                $orderitems->save();
            }
            $cartcheckout = Cart::where('customer_id','=',$userid)
                ->where('is_cancelled','=',0)
                ->where('is_checkout','=',0)
                ->where('is_abandoned','=',0)
                ->get()
                ->first();
            $cartcheckout->is_checkout = 1;
            $cartcheckout->save();
            $deletecartitems = CartItem::where('cart_id','=',$cart_id)
            ->delete();

            return redirect('home');
            
        }

        public function showinvoice()
        {

                        $userid=Auth::id();


                $activecart = Order::where('customer_id','=',$userid)
                ->where('is_active','=',0)
                ->count();

                if($activecart == 0)
                {
                    \Session::flash('flash_message','You currently have no active order');
                    return redirect('home');
                }
                else
                {
                $order_ids = Order::where('customer_id','=',$userid)
                ->where('is_active','=',0)
                ->get()
                ->first();

                $order_id= $order_ids->id;


            $orderitems = Product::
            join('order_items','order_items.product_id','=','products.id')
            ->where('order_id','=',$order_id)
              ->get();


            $total = OrderItem::where('order_id','=',$order_id)
            ->sum('price');
            
            $dates = Order::where('customer_id','=',$userid)
            ->where('is_active','=',0)
            ->get()
            ->first();
            $date = $dates->created_at;

        return view('invoice',compact('orderitems','total','date'));
                }

        }

}


