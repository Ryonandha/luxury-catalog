<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Catalog - CodeCraft Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #0f0f0f; color: #f3f4f6; }
        .accent-color { color: #facc15; } /* Tailwind Yellow-400 */
        .bg-accent { background-color: #facc15; color: #000; }
        .bg-accent:hover { background-color: #eab308; } /* Tailwind Yellow-500 */
        .card-bg { background-color: #1a1a1a; }
    </style>
</head>
<body class="antialiased selection:bg-yellow-400 selection:text-black min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="border-b border-gray-800 bg-[#0f0f0f] py-5 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight">
                LUXURY<span class="accent-color">CATALOG</span>
            </a>
            <a href="/admin" class="text-sm font-semibold hover:text-yellow-400 transition">Admin Login &rarr;</a>
        </div>
    </nav>

    <!-- Header & Search/Filter -->
    <header class="py-12 border-b border-gray-800">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Discover Premium Quality</h1>
            <p class="text-gray-400 mb-10 max-w-2xl mx-auto">Jelajahi koleksi produk eksklusif kami. Didesain dengan presisi untuk memenuhi gaya hidup Anda.</p>

            <form action="{{ route('home') }}" method="GET" class="max-w-3xl mx-auto flex flex-col md:flex-row gap-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..." class="w-full bg-gray-900 border border-gray-700 text-white px-5 py-3 rounded focus:outline-none focus:border-yellow-400 transition">
                
                <select name="category" class="bg-gray-900 border border-gray-700 text-white px-5 py-3 rounded focus:outline-none focus:border-yellow-400 appearance-none">
                    <option value="all">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-accent px-8 py-3 rounded font-bold transition whitespace-nowrap">
                    Cari Produk
                </button>
            </form>
        </div>
    </header>

    <!-- Product Grid -->
    <main class="flex-grow container mx-auto px-6 py-12">
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="card-bg rounded-lg overflow-hidden border border-gray-800 hover:border-yellow-400 transition duration-300 group flex flex-col">
                        <!-- Image -->
                        <div class="aspect-square bg-gray-900 relative overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="flex items-center justify-center w-full h-full text-gray-600">No Image</div>
                            @endif
                            <div class="absolute top-3 right-3 bg-black/70 text-xs px-2 py-1 rounded backdrop-blur-sm border border-gray-700">
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="font-bold text-lg mb-2 line-clamp-1" title="{{ $product->name }}">{{ $product->name }}</h3>
                            <div class="text-sm text-gray-400 line-clamp-2 mb-4 flex-grow">
                                {!! strip_tags($product->description) !!}
                            </div>
                            <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-800">
                                <span class="font-extrabold accent-color text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <button class="text-sm font-semibold hover:text-yellow-400 transition">Beli &rarr;</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <svg class="mx-auto h-12 w-12 text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="text-xl font-bold mb-2">Belum Ada Produk</h3>
                <p class="text-gray-400">Silakan tambahkan produk melalui panel admin atau ubah filter pencarian Anda.</p>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 py-8 text-center text-gray-500 text-sm">
        <p>&copy; 2026 CodeCraft Studio - Ryonandha Mitchell. All rights reserved.</p>
    </footer>

</body>
</html>