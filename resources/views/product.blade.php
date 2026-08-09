<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Luxury Catalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #0f0f0f; color: #f3f4f6; }
        .accent-color { color: #facc15; } /* Tailwind Yellow-400 */
        .bg-accent { background-color: #facc15; color: #000; }
        .bg-accent:hover { background-color: #eab308; }
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
            <a href="{{ route('home') }}" class="text-sm font-semibold hover:text-yellow-400 transition">&larr; Kembali ke Katalog</a>
        </div>
    </nav>

    <!-- Product Detail Section -->
    <main class="flex-grow container mx-auto px-6 py-12 flex items-center justify-center">
        <div class="max-w-5xl w-full card-bg rounded-xl border border-gray-800 overflow-hidden flex flex-col md:flex-row shadow-2xl">
            
            <!-- Image Area -->
            <div class="md:w-1/2 bg-gray-900 flex items-center justify-center p-8 relative">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded shadow-lg">
                @else
                    <div class="text-gray-600 font-medium">No Image Available</div>
                @endif
            </div>

            <!-- Content Area -->
            <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                <div class="text-xs font-bold tracking-widest text-gray-500 uppercase mb-3">
                    Kategori: {{ $product->category->name ?? 'Uncategorized' }}
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">{{ $product->name }}</h1>
                
                <p class="text-3xl font-black accent-color mb-8">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                
                <div class="text-gray-300 leading-relaxed mb-10 prose prose-invert">
                    {!! $product->description !!}
                </div>

                <!-- WhatsApp Order Button -->
                @php
                    // Pesan otomatis yang akan dikirim ke WhatsApp Anda
                    $waMessage = "Halo CodeCraft Studio! Saya tertarik untuk memesan produk ini:%0A%0A*{$product->name}*%0AHarga: Rp " . number_format($product->price, 0, ',', '.') . "%0A%0AMohon info lebih lanjut ya. Terima kasih!";
                    
                    // Ganti angka di bawah ini dengan nomor WA bisnis Anda (Gunakan format 62 tanpa + atau 0 di depan)
                    $waNumber = "6281234567890"; 
                @endphp
                
                <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" target="_blank" class="bg-accent px-8 py-4 rounded font-bold text-center transition flex items-center justify-center gap-3 hover:-translate-y-1 transform duration-200 shadow-xl shadow-yellow-500/20">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.52 3.449A11.956 11.956 0 0012.008 0C5.392 0 0 5.394 0 12.012c0 2.115.551 4.18 1.6 6.002L.014 24l6.14-1.61c1.765.961 3.738 1.47 5.845 1.47 6.613 0 12.006-5.395 12.006-12.014a11.96 11.96 0 00-3.485-8.397zm-8.512 18.526c-1.795 0-3.55-.483-5.088-1.393l-.365-.216-3.774.99 1.01-3.68-.237-.378A9.957 9.957 0 012.01 12.012c0-5.503 4.48-9.986 9.996-9.986 2.666 0 5.17.1037 7.054 2.924 1.884 1.886 2.923 4.39 2.923 7.056 0 5.506-4.48 9.969-9.975 9.969zm5.485-7.498c-.3-.151-1.782-.883-2.059-.984-.277-.101-.478-.151-.68.151-.201.303-.78 1.002-.956 1.204-.176.202-.352.227-.654.076-1.411-.708-2.618-1.573-3.626-3.082-.258-.39-.028-.6.122-.751.135-.136.302-.352.453-.529.151-.176.201-.302.302-.504.101-.202.051-.378-.025-.53-.075-.151-.68-1.637-.932-2.242-.245-.59-.496-.511-.68-.52-.176-.008-.377-.01-.58-.01a1.11 1.11 0 00-.806.378c-.277.303-1.057 1.034-1.057 2.52 0 1.486 1.082 2.922 1.233 3.124.151.202 2.13 3.255 5.158 4.56.72.308 1.282.493 1.721.631.723.23 1.378.197 1.895.12.583-.087 1.782-.728 2.033-1.433.252-.705.252-1.309.176-1.434-.075-.126-.277-.202-.578-.354z"/></svg>
                    Beli via WhatsApp
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 py-8 text-center text-gray-500 text-sm mt-auto">
        <p>&copy; 2026 CodeCraft Studio - Ryonandha Mitchell. All rights reserved.</p>
    </footer>

</body>
</html>