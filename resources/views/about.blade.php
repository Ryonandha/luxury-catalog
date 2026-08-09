<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Luxury Catalog</title>
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
        <span class="mx-2">Elegansi</span> • 
        <span class="mx-2">Kualitas Premium</span> •
        <span class="mx-2">Gaya Eksklusif</span>
    </div>

    <!-- Navbar -->
    <nav class="border-b border-gray-800 glass-nav py-4 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter">
                LUXURY<span class="accent-color">CATALOG</span>
            </a>
            <div class="flex gap-6 items-center">
                <a href="{{ route('home') }}" class="text-sm font-bold text-gray-400 hover:text-white transition">Katalog</a>
                <a href="{{ route('about') }}" class="text-sm font-bold accent-color border-b border-yellow-400 pb-1">Tentang Kami</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="relative py-24 border-b border-gray-800 overflow-hidden">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-yellow-400/5 rounded-full blur-[80px] -z-10"></div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tight uppercase">
                    Mendefinisikan Ulang <span class="accent-color">Gaya Anda</span>.
                </h1>
                <p class="text-gray-400 max-w-3xl mx-auto text-lg leading-relaxed">
                    Luxury Catalog lahir dari dedikasi terhadap detail dan estetika. Kami menghadirkan kurasi pakaian premium yang tidak hanya nyaman dikenakan, tetapi juga memancarkan kepercayan diri di setiap langkah Anda.
                </p>
            </div>
        </section>

        <!-- Nilai Merek Section -->
        <section class="py-24 container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black uppercase tracking-wider mb-4">Standar <span class="accent-color">Kualitas</span> Kami</h2>
                <div class="w-24 h-1 bg-yellow-400 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="card-bg p-10 border border-gray-800 hover:border-yellow-400 transition duration-500 group">
                    <div class="w-16 h-16 bg-gray-900 flex items-center justify-center rounded mb-6 group-hover:bg-yellow-400 group-hover:text-black transition duration-500">
                        <!-- Icon Baju/Bahan -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 uppercase tracking-wide">Material Premium</h3>
                    <p class="text-gray-500 leading-relaxed">Setiap benang dipilih dengan standar tertinggi. Kami menggunakan bahan kain yang lembut, *breathable*, dan tahan lama untuk memastikan kenyamanan sepanjang hari.</p>
                </div>

                <!-- Value 2 -->
                <div class="card-bg p-10 border border-gray-800 hover:border-yellow-400 transition duration-500 group">
                    <div class="w-16 h-16 bg-gray-900 flex items-center justify-center rounded mb-6 group-hover:bg-yellow-400 group-hover:text-black transition duration-500">
                        <!-- Icon Gunting/Desain -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 uppercase tracking-wide">Desain Eksklusif</h3>
                    <p class="text-gray-500 leading-relaxed">Potongan (*cutting*) presisi yang dirancang khusus untuk mengikuti postur tubuh modern. Gaya yang tidak lekang oleh waktu namun tetap *trendy*.</p>
                </div>

                <!-- Value 3 -->
                <div class="card-bg p-10 border border-gray-800 hover:border-yellow-400 transition duration-500 group">
                    <div class="w-16 h-16 bg-gray-900 flex items-center justify-center rounded mb-6 group-hover:bg-yellow-400 group-hover:text-black transition duration-500">
                        <!-- Icon Kotak/Paket -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 uppercase tracking-wide">Pengalaman Terbaik</h3>
                    <p class="text-gray-500 leading-relaxed">Mulai dari pengemasan yang mewah hingga pengiriman yang aman, kami memastikan produk sampai di tangan Anda dalam kondisi sempurna.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 bg-[#0a0a0a] py-12 relative z-10">
        <div class="container mx-auto px-6 text-center">
            <a href="{{ route('home') }}" class="text-xl font-black tracking-tighter text-gray-300">
                LUXURY<span class="accent-color">CATALOG</span>
            </a>
            <p class="text-gray-600 text-sm mt-4">&copy; 2026 Ryonandha Mitchell. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>