<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Catalog - CodeCraft Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #0a0a0a; color: #f3f4f6; }
        .accent-color { color: #facc15; } 
        .bg-accent { background-color: #facc15; color: #000; }
        .bg-accent:hover { background-color: #eab308; }
        .card-bg { background-color: #121212; }
        .glass-nav { background: rgba(10, 10, 10, 0.85); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="antialiased selection:bg-yellow-400 selection:text-black min-h-screen flex flex-col relative">

    <!-- Top Trust Bar -->
    <div class="bg-accent text-xs font-bold text-center py-2 tracking-widest uppercase">
        <span class="mx-2">100% Authentic</span> • 
        <span class="mx-2">Secure Payment</span> • 
        <span class="mx-2">Fast Delivery</span>
    </div>

    <!-- Navbar -->
    <nav class="border-b border-gray-800 glass-nav py-4 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter">
                LUXURY<span class="accent-color">CATALOG</span>
            </a>
            <div class="flex gap-6 items-center">
                <a href="{{ route('about') }}" class="text-sm font-bold text-gray-400 hover:text-white transition">Tentang Kami</a>
                <a href="/cc-admin" class="text-sm font-bold bg-gray-900 border border-gray-800 px-4 py-2 rounded hover:border-yellow-400 transition">Admin &rarr;</a>
            </div>
        </div>
    </nav>

    <!-- Hero Banner -->
    <header class="relative py-20 lg:py-32 border-b border-gray-800 overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-yellow-400/5 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tight uppercase">
                Redefining <br/> <span class="accent-color">Premium</span> Standard.
            </h1>
            <p class="text-gray-400 mb-12 max-w-2xl mx-auto text-lg">
                Kurasi eksklusif untuk gaya hidup modern Anda. Dapatkan koleksi terbaru dengan kualitas tanpa kompromi.
            </p>

            <!-- Form Pencarian, Kategori & Sorting -->
            <form action="{{ route('home') }}" method="GET" class="max-w-5xl mx-auto bg-gray-900/50 p-2 rounded-lg border border-gray-800 flex flex-col md:flex-row gap-2 shadow-2xl backdrop-blur-sm">
                
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari koleksi impian Anda..." class="w-full bg-transparent text-white px-5 py-3 focus:outline-none placeholder-gray-500">
                
                <div class="w-px bg-gray-800 hidden md:block my-2"></div>

                <select name="category" class="bg-transparent text-gray-300 px-5 py-3 focus:outline-none appearance-none cursor-pointer border-t border-gray-800 md:border-none md:w-64">
                    <option value="all" class="bg-gray-900">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="bg-gray-900" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <div class="w-px bg-gray-800 hidden md:block my-2"></div>

                <select name="sort" class="bg-transparent text-gray-300 px-5 py-3 focus:outline-none appearance-none cursor-pointer border-t border-gray-800 md:border-none md:w-64">
                    <option value="terbaru" class="bg-gray-900" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="termurah" class="bg-gray-900" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="termahal" class="bg-gray-900" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Harga Tertinggi</option>
                </select>

                <button type="submit" class="bg-accent px-8 py-3 rounded font-bold transition whitespace-nowrap w-full md:w-auto">
                    Eksplorasi
                </button>
            </form>
        </div>
    </header>

    <!-- Kategori Cepat -->
    <div class="container mx-auto px-6 py-6 border-b border-gray-800 flex gap-6 overflow-x-auto whitespace-nowrap hide-scrollbar text-sm font-bold text-gray-400 uppercase tracking-wider justify-center">
        <a href="{{ route('home') }}" class="{{ !request('category') || request('category') == 'all' ? 'accent-color' : 'hover:text-white transition' }}">All Collection</a>
        @foreach($categories as $category)
            <a href="{{ route('home', ['category' => $category->id]) }}" class="{{ request('category') == $category->id ? 'accent-color' : 'hover:text-white transition' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Product Grid -->
    <main class="flex-grow container mx-auto px-6 py-16">
        <div class="flex justify-between items-end mb-10">
            <h2 class="text-2xl font-bold uppercase tracking-wide">
                {{ request('search') ? 'Hasil Pencarian' : 'Koleksi Kami' }}
            </h2>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="card-bg rounded-none border border-gray-800 hover:border-yellow-400 transition duration-300 group flex flex-col relative">
                        
                        <!-- Badge NEW -->
                        @if($product->created_at >= now()->subDays(7))
                            <div class="absolute top-4 left-0 bg-accent text-black text-[10px] font-black px-3 py-1 uppercase tracking-widest z-10 shadow-lg">
                                New
                            </div>
                        @endif

                        <!-- Image -->
                        <a href="{{ route('product.show', $product->slug) }}" class="aspect-square bg-gray-900 relative overflow-hidden block">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-in-out opacity-90 group-hover:opacity-100">
                            @else
                                <div class="flex items-center justify-center w-full h-full text-gray-600">No Image</div>
                            @endif
                        </a>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs text-gray-500 uppercase tracking-widest mb-2">{{ $product->category->name ?? 'Uncategorized' }}</div>
                            <a href="{{ route('product.show', $product->slug) }}">
                                <h3 class="font-bold text-lg mb-2 line-clamp-1 hover:text-yellow-400 transition" title="{{ $product->name }}">{{ $product->name }}</h3>
                            </a>
                            <div class="flex justify-between items-end mt-auto pt-6">
                                <span class="font-bold text-white text-lg tracking-wide">IDR {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.show', $product->slug) }}" class="text-sm font-bold accent-color hover:text-white transition uppercase tracking-wider border-b border-transparent hover:border-white pb-1">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bagian Navigasi Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $products->links() }}
            </div>

        @else
            <div class="text-center py-20 border border-gray-800 border-dashed rounded-lg bg-gray-900/20">
                <h3 class="text-xl font-bold mb-2">Koleksi Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba ubah kata kunci atau pengaturan filter Anda.</p>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 bg-[#0a0a0a] py-12 mt-auto">
        <div class="container mx-auto px-6 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-black tracking-tighter text-gray-300">
                    LUXURY<span class="accent-color">CATALOG</span>
                </a>
                <p class="text-gray-600 text-sm mt-2">&copy; 2026 CodeCraft Studio. Ryonandha Mitchell.</p>
            </div>
            <div class="flex gap-6 text-sm font-bold text-gray-500 uppercase tracking-widest">
                <a href="#" class="hover:text-yellow-400 transition">Instagram</a>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-yellow-400 transition">WhatsApp</a>
            </div>
        </div>
    </footer>

</body>
</html>