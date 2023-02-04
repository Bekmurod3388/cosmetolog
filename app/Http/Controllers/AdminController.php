<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function view_category(){
        $categories = Category::all();
        return view('admin.category',['categories'=>$categories]);
    }
    public function store(Request $request){
        //dd($request->all());
        $category = new Category();
        $category->create($request->all());
        return redirect()->back()->with('success','Сохранено!');
    }

    public function delete_category($id){
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }

    public function view_product(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create_product(){
        $categories = Category::all();
        return view("admin.products.create", compact("categories"));
    }

    public function store_product(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->image = $imageName;
        $product->save();
        return redirect()->route("view_product")->with('success','Сохранено!');
    }

    public function edit_product($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view("admin.products.edit", compact("categories", "product"));
    }

    public function update_product(Request $request, $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->image = $imageName;
        $product->save();
        return redirect()->route("view_product")->with('success','Сохранено!');
    }

    public function delete_product($id){
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }

    public function order(){
        $orders = Order::all();
        return view("admin.order", compact('orders'));
    }

    public function delivered($id){
        $order = Order::find($id);
        $order->delivery_status = "доставлено";
        $order->payment_status = "оплачено";
        $order->save();
        return redirect()->back()->with('success', "");
    }
    public function print_pdf($id){
        $order = Order::find($id);
        $pdf = Pdf::loadView('admin.pdf', compact('order'));
        return $pdf->download("order_details.pdf");
    }

    public function send_email($id){
        $order = Order::find($id);
        return view('admin.email',compact('order'));
    }

    public function send_user_email(Request $request, $id){
        $order = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($order, new SendEmailNotification($details));

    }
}
