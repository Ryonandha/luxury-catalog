<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $query = Product::with('category')->where('is_available', true);

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->get();

        return view('welcome', compact('categories', 'products'));
    }
    public function about()
    {
        return view('about');
    }
    public function show(Product $product)
    {
        // Jika produk tidak tersedia, kembalikan pengunjung ke halaman utama
        if (!$product->is_available) {
            return redirect()->route('home');
        }

        // Tampilkan halaman detail produk
        return view('product', compact('product'));
    }
}