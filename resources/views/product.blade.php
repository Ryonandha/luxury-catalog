<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Meta SEO agar rapi saat link disebar di WhatsApp -->
    <title>{{ $product->name }} | Luxury Catalog</title>
    <meta name="description" content="{!! Str::limit(strip_tags($product->description), 150) !!}">
    <meta property="og:title" content="{{ $product->name }} | Luxury Catalog">
    <meta property="og:image" content="{{ asset('storage/' . $product->image) }}">

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
            <a href="{{ route('home') }}" class="text-sm font-bold text-gray-400 hover:text-yellow-400 transition">&larr; Back to Catalog</a>
        </div>
    </nav>

    <!-- Product Detail Section -->
    <main class="flex-grow container mx-auto px-6 py-16 flex items-center justify-center relative">
        <!-- Dekorasi Latar Belakang -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-yellow-400/5 rounded-full blur-[100px] -z-10"></div>

        <div class="max-w-6xl w-full card-bg rounded-none border border-gray-800 flex flex-col md:flex-row shadow-2xl relative z-10">
            
            <!-- Image Area -->
            <div class="md:w-1/2 bg-gray-900/50 flex items-center justify-center relative p-8 md:p-16">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover shadow-2xl transition duration-700 hover:scale-105">
                @else
                    <div class="text-gray-600 font-medium">No Image Available</div>
                @endif
            </div>

            <!-- Content Area -->
            <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                <div class="text-xs font-black tracking-widest text-gray-500 uppercase mb-4 border-b border-gray-800 pb-4">
                    Category: <span class="accent-color">{{ $product->category->name ?? 'Uncategorized' }}</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-black mb-4 leading-tight tracking-tight hover:text-yellow-400 transition">{{ $product->name }}</h1>
                
                <p class="text-3xl font-black text-white mb-8">
                    IDR {{ number_format($product->price, 0, ',', '.') }}
                </p>
                
                <div class="text-gray-400 leading-relaxed mb-12 prose prose-invert">
                    {!! $product->description !!}
                </div>

                <!-- WhatsApp Order Button -->
                @php
                    $waMessage = "Halo CodeCraft Studio! Saya tertarik dengan koleksi ini:%0A%0A*{$product->name}*%0AHarga: IDR " . number_format($product->price, 0, ',', '.') . "%0A%0AMohon panduan untuk proses pembayarannya. Terima kasih!";
                    $waNumber = "6281234567890"; // <- GANTI DENGAN NOMOR WA ASLI
                @endphp
                
                <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" target="_blank" class="bg-accent px-8 py-5 font-black text-center transition flex items-center justify-center gap-3 hover:bg-yellow-500 text-black uppercase tracking-widest shadow-lg hover:shadow-yellow-400/20 w-full md:w-fit">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.52 3.449A11.956 11.956 0 0012.008 0C5.392 0 0 5.394 0 12.012c0 2.115.551 4.18 1.6 6.002L.014 24l6.14-1.61c1.765.961 3.738 1.47 5.845 1.47 6.613 0 12.006-5.395 12.006-12.014a11.96 11.96 0 00-3.485-8.397zm-8.512 18.526c-1.795 0-3.55-.483-5.088-1.393l-.365-.216-3.774.99 1.01-3.68-.237-.378A9.957 9.957 0 012.01 12.012c0-5.503 4.48-9.986 9.996-9.986 2.666 0 5.17.1037 7.054 2.924 1.884 1.886 2.923 4.39 2.923 7.056 0 5.506-4.48 9.969-9.975 9.969zm5.485-7.498c-.3-.151-1.782-.883-2.059-.984-.277-.101-.478-.151-.68.151-.201.303-.78 1.002-.956 1.204-.176.202-.352.227-.654.076-1.411-.708-2.618-1.573-3.626-3.082-.258-.39-.028-.6.122-.751.135-.136.302-.352.453-.529.151-.176.201-.302.302-.504.101-.202.051-.378-.025-.53-.075-.151-.68-1.637-.932-2.242-.245-.59-.496-.511-.68-.52-.176-.008-.377-.01-.58-.01a1.11 1.11 0 00-.806.378c-.277.303-1.057 1.034-1.057 2.52 0 1.486 1.082 2.922 1.233 3.124.151.202 2.13 3.255 5.158 4.56.72.308 1.282.493 1.721.631.723.23 1.378.197 1.895.12.583-.087 1.782-.728 2.033-1.433.252-.705.252-1.309.176-1.434-.075-.126-.277-.202-.578-.354z"/></svg>
                    Order via WhatsApp
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 bg-[#0a0a0a] py-12 mt-auto relative z-10">
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

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-6 right-6 bg-[#25D366] text-white p-4 rounded-full shadow-[0_0_20px_rgba(37,211,102,0.4)] hover:scale-110 transition transform duration-300 z-50 flex items-center justify-center group">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.52 3.449A11.956 11.956 0 0012.008 0C5.392 0 0 5.394 0 12.012c0 2.115.551 4.18 1.6 6.002L.014 24l6.14-1.61c1.765.961 3.738 1.47 5.845 1.47 6.613 0 12.006-5.395 12.006-12.014a11.96 11.96 0 00-3.485-8.397zm-8.512 18.526c-1.795 0-3.55-.483-5.088-1.393l-.365-.216-3.774.99 1.01-3.68-.237-.378A9.957 9.957 0 012.01 12.012c0-5.503 4.48-9.986 9.996-9.986 2.666 0 5.17.1037 7.054 2.924 1.884 1.886 2.923 4.39 2.923 7.056 0 5.506-4.48 9.969-9.975 9.969zm5.485-7.498c-.3-.151-1.782-.883-2.059-.984-.277-.101-.478-.151-.68.151-.201.303-.78 1.002-.956 1.204-.176.202-.352.227-.654.076-1.411-.708-2.618-1.573-3.626-3.082-.258-.39-.028-.6.122-.751.135-.136.302-.352.453-.529.151-.176.201-.302.302-.504.101-.202.051-.378-.025-.53-.075-.151-.68-1.637-.932-2.242-.245-.59-.496-.511-.68-.52-.176-.008-.377-.01-.58-.01a1.11 1.11 0 00-.806.378c-.277.303-1.057 1.034-1.057 2.52 0 1.486 1.082 2.922 1.233 3.124.151.202 2.13 3.255 5.158 4.56.72.308 1.282.493 1.721.631.723.23 1.378.197 1.895.12.583-.087 1.782-.728 2.033-1.433.252-.705.252-1.309.176-1.434-.075-.126-.277-.202-.578-.354z"/></svg>
    </a>

</body>
</html>