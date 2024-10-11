<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('usertype', 0)->count();

        $totalProducts = Product::where('type', 'Shopping')->count();
        $totalToLets = Product::where('type', 'To-Let')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalToLets',
        ));
    }

    public function UpdateOrder($user_id, $order_id, $delivery_status)
    {
        $order = Order::where('user_id', $user_id)->where('id', $order_id)->first();
        if ($order) {
            // the order was found, update the delivery status
            if ($delivery_status == 'cancel_order') {
                $product = Product::find($order->product_id);
                if ($product) {
                    // Update the quantity of the product in the products table
                    $product->quantity += $order->quantity;
                    $product->save();
                    // Remove the product from the cart
                    $order->delete();
                    return redirect()->back();
                } else {
                    return redirect()->back()->with('error', 'Product not found!');
                }
            } else {
                $order->delivery_status = $delivery_status;
                $order->save();
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

    }

    public function PrintBill($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if ($order) {
            $pdf = PDF::loadView('admin.user_bill', compact('order'));
            return $pdf->download('order_bill' . $order->id . '.pdf');
        } else {
            return redirect()->back();
        }
    }

    public function SearchProduct(Request $request)
    {
        $searchText = $request->search;
        $products = Product::where('title', 'LIKE', "%$searchText%")->orWhere('ram', 'LIKE', "%$searchText%")->orWhere('category', 'LIKE', "%$searchText%")->get();
        return view('admin.show_product', compact('products'));
    }

    public function SearchOrder(Request $request)
    {
        $searchText = $request->search;
        $orders = Order::where('tracking_id', 'LIKE', "%$searchText%")->where('delivery_status', '!=', 'passive_order')->get();
        return view('admin.orders', compact('orders'));
    }

    public function Customers()
    {
        $users = User::where('userType', '=', 0)->get();
        return view('admin.customers', compact('users'));

    }

    public function DeleteUser($id)
    {
        User::where('id', '=', $id)->delete();
        Cart::where('user_id', '=', $id)->delete();
        Order::where('user_id', '=', $id)->delete();
        return redirect()->back();
    }

    public function SearchUser(Request $request)
    {
        $searchText = $request->search;
        $users = User::where('name', 'LIKE', "%$searchText%")->orWhere('email', 'LIKE', "%$searchText%")->get();
        return view('admin.customers', compact('users'));
    }
}
