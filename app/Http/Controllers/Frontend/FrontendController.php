<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    use WithPagination;
    function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(10)->get();
        $newArrivalsProducts = Product::latest()->take(7)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->get();
        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalsProducts', 'featuredProducts',));
    }

    function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    function productView(string $category_slug, string $product_slug)
    {

        $category = Category::where('slug', $category_slug)->first();

        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();

            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function newArrival()
    {
        $newArrivalsProducts = Product::latest()->take(8)->get();
        // $newArrivalsProducts = Product::all();
        return view('frontend.pages.new-arrival', compact('newArrivalsProducts'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->latest()->get();
        // $newArrivalsProducts = Product::all();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }

    public function searchProducts(Request $request)
    {

        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(20);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Empty search');
        }
    }


    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Username' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::id();

        ContactRequest::create([
            'user_id' => $user_id,
            'Username' => $request->input('Username'), // Ensure to use input method to access form values
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('message', 'Message sent Successfully');
    }


    public function aboutUs()
    {
        return view('frontend.pages.aboutUs');
    }
}
