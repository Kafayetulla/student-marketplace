<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::Where('status', 1)->latest()->take(4)->get();
        $categories = [];

        return view('user.index', compact('products', 'categories'));
    }

    public function home()
    {
        if (Auth::user()->usertype == '1') {
            return redirect(route('admin.dashboard'));
        } else {
            return redirect('/');
        }
    }

    public function UserLogout(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
        Cookie::queue(Cookie::forget('laravel_session'));
        return redirect('/');
    }

    public function shopping()
    {
        $products = Product::whereType('Shopping')->Where('status', 1)->latest()->get();
        $categories = $products->pluck('category')->unique()->toArray();

        return view('user.shopping', compact('products', 'categories'));
    }

    public function shoppingDetails(Product $product)
    {
        return view('user.product_details', compact('product'));
    }

    public function toLet()
    {
        $products = Product::whereType('To-Let')->Where('status', 1)->latest()->get();
        $categories = $products->pluck('category')->unique()->toArray();

        return view('user.to-lets', compact('products', 'categories'));
    }

    public function toLetDetails(Product $product)
    {
        return view('user.product_details', compact('product'));
    }

    public function ContactPage()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.contact', compact('cartData'));
        } else {
            return view('user.contact');
        }

    }

    public function SearchProduct(Request $request)
    {
        $searchText = $request->search;
        $products = Product::where('title', 'LIKE', "%$searchText%")->orWhere('ram', 'LIKE', "%$searchText%")->orWhere('category', 'LIKE', "%$searchText%")->get();
        $categories = Category::all();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartData = Cart::where('user_id', '=', $user_id)->get();
            return view('user.shop', compact('products', 'categories', 'cartData'));
        } else {
            return view('user.shop', compact('products', 'categories'));
        }
    }

    public function UpdatePassword()
    {
        if (Auth::check()) {
            return view('profile.update-profile-information-form');
        } else {
            return redirect('login');
        }
    }
}
