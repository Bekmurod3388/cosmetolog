<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    public function index(){
        $products = Product::paginate(9);
        $comments = Comment::orderby("id", "DESC")->get();
        $reply = Reply::orderby("id", "DESC")->get();
        return view('home.userpage', compact("products", "comments", "reply"));
    }
    public function redirect(Request $request){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            foreach ($order as $item){
                $total_revenue += $item->price * $item->quantity;
            }
            $total_delivered = Order::where("delivery_status", "доставлено")->sum('quantity');
            $total_processing = Order::where("delivery_status", "обработка")->sum('quantity');
            return view('admin.home', [
                'total_product' => $total_product,
                'total_order' => $total_order,
                'total_user' => $total_user,
                'total_revenue' => $total_revenue,
                'total_delivered' => $total_delivered,
                'total_processing' => $total_processing,
            ]);
        }
        else{
            $products = Product::paginate(9);
            $comments = Comment::orderby("id", "DESC")->get();
            $reply = Reply::orderby("id", "DESC")->get();
            return view('home.userpage', compact("products", "comments","reply"));
        }
    }

    public function product_details($id){
        $product = Product::find($id);
        return view("home.product_details", compact("product"));
    }

    public function add_cart(Request $request, $id){
        if (Auth::id()){
            $user = Auth::user()->id;
            $product = Product::find($id);
            $product_exist_id = Cart::where('product_id', $id)->where('user_id', $user)->get('id')->first();
            if ($product_exist_id){
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity+$request->quantity;
                $cart->save();}
            else{
                $cart = new Cart();
                $cart->user_id = $user;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
                $cart->save();
            }
            Alert::success('Продукт успешно добавлен', 'Мы добавили товар в корзину');
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function show_cart(){
        if (Auth::id()){
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', $id)->get();
            return view('home.showcart', compact('carts'));
        }
        else {
            return redirect('login');
        }

    }
    public function remove_cart($id){
        Cart::find($id)->delete();
        Alert::warning('Продукт успешно удален', 'Мы удалили товар в корзину');
        return redirect()->back();
    }

    public function cash_order(){
        $user = Auth::user()->id;
        $data = Cart::where("user_id", $user)->get();
        foreach ($data as $item){
            if ($item->product->discount_price != null)
                $price = $item->product->discount_price;
            else $price = $item->product->price;
            $order = new Order();
            $order->user_id = $user;
            $order->product_id = $item->product_id;
            $order->price = $price;
            $order->quantity = $item->quantity;
            $order->payment_status = "оплата при доставке";
            $order->delivery_status = "обработка";
            $order->save();

            Cart::find($item->id)->delete();
        }
        Alert::success('Успешно', 'У нас есть наложенный платеж в корзину');
        return redirect()->back();
    }

    public function stripe($totalprice){
        return view("home.stripe", compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment."
        ]);

        $user = Auth::user()->id;
        $data = Cart::where("user_id", $user)->get();
        foreach ($data as $item){
            if ($item->product->discount_price != null)
                $price = $item->product->discount_price;
            else $price = $item->product->price;
            $order = new Order();
            $order->user_id = $user;
            $order->product_id = $item->product_id;
            $order->price = $price;
            $order->quantity = $item->quantity;
            $order->payment_status = "оплачено";
            $order->delivery_status = "обработка";
            $order->save();

            Cart::find($item->id)->delete();
        }

        Session::flash('success', 'Оплата прошла успешно!');

        return back();
    }

    public function show_order(){
        if (Auth::id()){
            $id = Auth::user()->id;
            $orders = Order::where('user_id', $id)->get();
            return view('home.order', compact('orders'));
        }
        else {
            return redirect('login');
        }

    }

    public function cancel_order($id){
        $order = Order::find($id);
        $order->delivery_status = "отмена";
        $order->save();
        return redirect()->back();
    }

    public function add_comment(Request $request){
        if (Auth::id()){
            $user = Auth::user();
            $comment = new Comment();
            $comment->name = $user->name;
            $comment->comment = $request->comment;
            $comment->user_id = $user->id;
            $comment->save();
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function add_reply(Request $request){
        if (Auth::id()){
            $user = Auth::user();
            $reply = new Reply();
            $reply->name = $user->name;
            $reply->comment_id = $request->commentId;
            $reply->user_id = $user->id;
            $reply->reply = $request->reply;
            $reply->save();
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function product_search(Request $request){
        $search_text = $request->search;
        $comments = Comment::orderby("id", "DESC")->get();
        $reply = Reply::orderby("id", "DESC")->get();
        $products = Product::where("title", "LIKE", "%{$search_text}%")
            ->orWhere("category", "LIKE", "%{$search_text}%")
            ->paginate(9);
        return view('home.userpage', compact('products','comments','reply'));
    }

    public function product(){
        $products = Product::paginate(9);
        $comments = Comment::orderby("id", "DESC")->get();
        $reply = Reply::orderby("id", "DESC")->get();
        return view('home.all_product', compact('products','comments','reply'));
    }
}
