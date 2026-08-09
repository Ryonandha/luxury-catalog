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

        // Filter Kategori
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // Filter Pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter Urutkan (Sorting)
        if ($request->has('sort')) {
            if ($request->sort == 'termurah') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'termahal') {
                $query->orderBy('price', 'desc');
            } else {
                $query->latest(); // Default: Terbaru
            }
        } else {
            $query->latest();
        }

        // Memecah halaman menjadi maksimal 8 produk per halaman
        // withQueryString() memastikan filter pencarian tidak hilang saat pindah halaman
        $products = $query->paginate(8)->withQueryString();

        return view('welcome', compact('categories', 'products'));
    }

    public function about()
    {
        return view('about');
    }

    public function show(Product $product)
    {
        if (!$product->is_available) {
            return redirect()->route('home');
        }

        return view('product', compact('product'));
    }
}