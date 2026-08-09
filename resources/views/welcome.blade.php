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
        .accent-color { color: #facc15; } /* Tailwind Yellow-400 */
        .bg-accent { background-color: #facc15; color: #000; }
        .bg-accent:hover { background-color: #eab308; }
        .card-bg { background-color: #121212; }
        
        /* Efek garis halus di bawah nav */
        .glass-nav { background: rgba(10, 10, 10, 0.85); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="antialiased selection:bg-yellow-400 selection:text-black min-h-screen flex flex-col relative">

    <!-- 1. Top Trust Bar (Pita Kepercayaan) -->
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
            <a href="/admin" class="text-sm font-semibold text-gray-400 hover:text-yellow-400 transition">Admin Panel</a>
        </div>
    </nav>

    <!-- 2. Hero Banner Minimalis & Mewah -->
    <header class="relative py-20 lg:py-32 border-b border-gray-800 overflow-hidden">
        <!-- Aksen Dekorasi Latar Belakang -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-yellow-400/5 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tight uppercase">
                Redefining <br/> <span class="accent-color">Premium</span> Standard.
            </h1>
            <p class="text-gray-400 mb-12 max-w-2xl mx-auto text-lg">
                Kurasi eksklusif untuk gaya hidup modern Anda. Dapatkan koleksi terbaru dengan kualitas tanpa kompromi.
            </p>

            <!-- Modifikasi Pencarian -->
            <form action="{{ route('home') }}" method="GET" class="max-w-4xl mx-auto bg-gray-900/50 p-2 rounded-lg border border-gray-800 flex flex-col md:flex-row gap-2 shadow-2xl backdrop-blur-sm">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari koleksi impian Anda..." class="w-full bg-transparent text-white px-5 py-3 focus:outline-none placeholder-gray-500">
                
                <div class="w-px bg-gray-800 hidden md:block my-2"></div>

                <select name="category" class="bg-transparent text-gray-300 px-5 py-3 focus:outline-none appearance-none cursor-pointer border-t border-gray-800 md:border-none">
                    <option value="all" class="bg-gray-900">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="bg-gray-900" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-accent px-8 py-3 rounded font-bold transition whitespace-nowrap w-full md:w-auto">
                    Eksplorasi
                </button>
            </form>
        </div>
    </header>

    <!-- Kategori Cepat (Quick Links) -->
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
                {{ request('search') ? 'Hasil Pencarian' : 'New Arrivals' }}
            </h2>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="card-bg rounded-none border border-gray-800 hover:border-yellow-400 transition duration-300 group flex flex-col relative">
                        
                        <!-- 3. Badge NEW (Otomatis untuk produk baru) -->
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
        @else
            <!-- ... (Kode state kosong tetap sama) ... -->
            <div class="text-center py-20 border border-gray-800 border-dashed rounded-lg bg-gray-900/20">
                <h3 class="text-xl font-bold mb-2">Koleksi Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba ubah kata kunci atau kategori filter Anda.</p>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 bg-[#0a0a0a] py-12">
        <div class="container mx-auto px-6 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-black tracking-tighter text-gray-300">
                    LUXURY<span class="accent-color">CATALOG</span>
                </a>
                <p class="text-gray-600 text-sm mt-2">&copy; 2026 CodeCraft Studio. Ryonandha Mitchell.</p>
            </div>
            <div class="flex gap-6 text-sm font-bold text-gray-500 uppercase tracking-widest">
                <a href="#" class="hover:text-yellow-400 transition">Instagram</a>
                <a href="#" class="hover:text-yellow-400 transition">WhatsApp</a>
            </div>
        </div>
    </footer>

    <!-- 4. Floating WhatsApp Button (Pojok Kanan Bawah) -->
    <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-6 right-6 bg-[#25D366] text-white p-4 rounded-full shadow-[0_0_20px_rgba(37,211,102,0.4)] hover:scale-110 transition transform duration-300 z-50 flex items-center justify-center group">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.52 3.449A11.956 11.956 0 0012.008 0C5.392 0 0 5.394 0 12.012c0 2.115.551 4.18 1.6 6.002L.014 24l6.14-1.61c1.765.961 3.738 1.47 5.845 1.47 6.613 0 12.006-5.395 12.006-12.014a11.96 11.96 0 00-3.485-8.397zm-8.512 18.526c-1.795 0-3.55-.483-5.088-1.393l-.365-.216-3.774.99 1.01-3.68-.237-.378A9.957 9.957 0 012.01 12.012c0-5.503 4.48-9.986 9.996-9.986 2.666 0 5.17.1037 7.054 2.924 1.884 1.886 2.923 4.39 2.923 7.056 0 5.506-4.48 9.969-9.975 9.969zm5.485-7.498c-.3-.151-1.782-.883-2.059-.984-.277-.101-.478-.151-.68.151-.201.303-.78 1.002-.956 1.204-.176.202-.352.227-.654.076-1.411-.708-2.618-1.573-3.626-3.082-.258-.39-.028-.6.122-.751.135-.136.302-.352.453-.529.151-.176.201-.302.302-.504.101-.202.051-.378-.025-.53-.075-.151-.68-1.637-.932-2.242-.245-.59-.496-.511-.68-.52-.176-.008-.377-.01-.58-.01a1.11 1.11 0 00-.806.378c-.277.303-1.057 1.034-1.057 2.52 0 1.486 1.082 2.922 1.233 3.124.151.202 2.13 3.255 5.158 4.56.72.308 1.282.493 1.721.631.723.23 1.378.197 1.895.12.583-.087 1.782-.728 2.033-1.433.252-.705.252-1.309.176-1.434-.075-.126-.277-.202-.578-.354z"/></svg>
    </a>

</body>
</html>