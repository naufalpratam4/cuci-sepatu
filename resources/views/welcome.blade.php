<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ushapp - Cuci Sepatu Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in-up': 'fadeInUp 1s ease-out',
                        'fade-in': 'fadeIn 1.2s ease-in-out'
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-800 scroll-smooth">
    @if (session('success'))
        <div id="toast-bottom-right"
            class="fixed flex items-center max-w-xs text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5  "
            role="alert">
            <div class="text-sm font-normal">
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow  "
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md shadow-md z-50 transition duration-500">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600 tracking-widest animate-fade-in"><img src="img\logo_ushapp.png"
                    width="70" alt=""></h1>
            <nav class="hidden md:flex space-x-6 text-sm font-medium">
                <a href="#layanan" class="hover:text-blue-500 transition duration-300">Layanan</a>
                <a href="#testimoni" class="hover:text-blue-500 transition duration-300">Testimoni</a>
                <a href="#kontak" class="hover:text-blue-500 transition duration-300">Kontak</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="pt-32 pb-24 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-200 rounded-full opacity-30 blur-3xl animate-pulse"></div>
        <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center gap-10 relative z-10">
            <div class="lg:w-1/2 animate-fade-in-up">
                <h2 class="text-5xl font-bold text-blue-800 leading-tight mb-4">Sepatu Bersih, Harimu Cerah</h2>
                <p class="text-gray-700 mb-6 text-lg">Ushapp hadir dengan layanan cuci sepatu profesional, cepat, dan
                    terpercaya. Jaga tampilan sepatumu kapan saja!</p>
                <a href="#layanan"
                    class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-white px-8 py-3 rounded-full shadow-xl hover:scale-105 transition-transform duration-300">Lihat
                    Layanan</a>
            </div>
            <div class="lg:w-1/2 animate-fade-in">
                <img src="https://cdn-icons-png.flaticon.com/512/1042/1042391.png"
                    class="w-full max-w-md mx-auto drop-shadow-2xl transform hover:scale-105 transition duration-500"
                    alt="Ilustrasi Sepatu">
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section id="layanan" class="py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-gray-800 mb-14 animate-fade-in-up">Layanan Kami</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                <div class="glass p-8 rounded-2xl shadow-xl hover:scale-105 transition duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/2917/2917995.png" class="w-16 h-16 mx-auto mb-4"
                        alt="">
                    <h4 class="text-xl font-semibold mb-2">Basic Wash</h4>
                    <p class="text-gray-700 text-sm mb-4">Cuci ringan untuk sepatu harianmu agar tetap segar dan bersih.
                    </p>
                    <p class="font-bold text-blue-700">Rp 25.000</p>
                </div>
                <div class="glass p-8 rounded-2xl shadow-xl hover:scale-105 transition duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/254/254638.png" class="w-16 h-16 mx-auto mb-4"
                        alt="">
                    <h4 class="text-xl font-semibold mb-2">Deep Clean</h4>
                    <p class="text-gray-700 text-sm mb-4">Membersihkan seluruh bagian luar dan dalam hingga ke detail
                        terkecil.</p>
                    <p class="font-bold text-blue-700">Rp 45.000</p>
                </div>
                <div class="glass p-8 rounded-2xl shadow-xl hover:scale-105 transition duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/7766/7766991.png" class="w-16 h-16 mx-auto mb-4"
                        alt="">
                    <h4 class="text-xl font-semibold mb-2">Premium Treatment</h4>
                    <p class="text-gray-700 text-sm mb-4">Perawatan khusus untuk bahan premium seperti suede dan kulit.
                    </p>
                    <p class="font-bold text-blue-700">Rp 75.000</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-28 bg-blue-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-gray-800 mb-14 animate-fade-in-up">Apa Kata Mereka?</h3>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                    <img src="https://i.pravatar.cc/80?img=3" class="w-14 h-14 mx-auto rounded-full mb-4" />
                    <p class="italic text-gray-600">“Hasil cucinya memuaskan banget, sepatu jadi kinclong lagi!”</p>
                    <p class="mt-4 font-semibold text-blue-700">Rian - Mahasiswa</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                    <img src="https://i.pravatar.cc/80?img=5" class="w-14 h-14 mx-auto rounded-full mb-4" />
                    <p class="italic text-gray-600">“Cocok buat sepatu kerja saya, cepat dan aman.”</p>
                    <p class="mt-4 font-semibold text-blue-700">Dita - Karyawan</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                    <img src="https://i.pravatar.cc/80?img=7" class="w-14 h-14 mx-auto rounded-full mb-4" />
                    <p class="italic text-gray-600">“Sudah langganan! Nggak pernah kecewa.”</p>
                    <p class="mt-4 font-semibold text-blue-700">Aldi - Sneakerhead</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl animate-ping"></div>
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <h3 class="text-3xl font-bold mb-4">Ingin Sepatumu Bersih Sekarang?</h3>
            <p class="mb-6 text-white/90">Hubungi kami melalui WhatsApp dan dapatkan layanan cepat & ramah!</p>
            <a href="#form-pesan"
                class="bg-white text-blue-700 font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-gray-100 transition">Isi
                Formulir Pemesanan</a>
        </div>
    </section>

    <!-- Form Pemesanan -->
    <section id="form-pesan" class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center text-gray-800 mb-10 animate-fade-in-up">
                Form Pemesanan
            </h3>
            <form id="formPesanan" action="{{ route('form.pemesanan.user') }}" method="POST"
                class="bg-white p-8 rounded-xl shadow-xl space-y-6">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-700">Nama
                        Lengkap</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" required
                        class="w-full rounded-lg border border-gray-300 p-3 text-gray-900 placeholder-gray-400
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama Anda">
                </div>

                <!-- Nomor WhatsApp -->
                <div>
                    <label for="no_pelanggan" class="block mb-2 text-sm font-medium text-gray-700">Nomor
                        WhatsApp</label>
                    <input type="tel" id="no_pelanggan" name="no_pelanggan" required
                        class="w-full rounded-lg border border-gray-300 p-3 text-gray-900 placeholder-gray-400
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="08xxxxxxxxxx">
                </div>

                <!-- Pilih Layanan -->
                <div>
                    <label for="tipe_sepatu_id" class="block mb-2 text-sm font-medium text-gray-700">Pilih
                        Layanan</label>
                    <select id="tipe_sepatu_id" name="tipe_sepatu_id" required
                        class="w-full rounded-lg border border-gray-300 p-3 text-gray-900
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->tipe_sepatu }} - Rp {{ $item->harga }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500">Free ongkir area UNNES dan sekitarnya</p>
                </div>

                <!-- Jumlah Sepatu -->
                <div>
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-700">Jumlah Sepatu</label>
                    <input type="number" id="jumlah" name="jumlah" required min="1"
                        class="w-full rounded-lg border border-gray-300 p-3 text-gray-900
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: 2">
                </div>

                <!-- Alamat / Lokasi -->
                <div>
                    <div id="alamat-container">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" id="alamat" name="alamat" required
                            class="w-full rounded-lg border border-gray-300 p-3 text-gray-900 placeholder-gray-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan alamat">
                    </div>

                    <p class="text-sm py-2 text-center text-gray-500">atau</p>

                    <div class="flex justify-center">
                        <button type="button" onclick="getLocation()"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                            Bagikan Alamat Terkini
                        </button>
                    </div>

                    <!-- Hidden fields untuk koordinat -->
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <p id="status" class="mt-2 text-sm text-gray-700 text-center"></p>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                    Kirim Pesanan
                </button>
            </form>
        </div>
    </section>

    <!-- Script Geolocation -->
    <script>
        function getLocation() {
            const status = document.getElementById('status');
            if (navigator.geolocation) {
                status.textContent = "Mendeteksi lokasi...";
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                status.textContent = "Browser Anda tidak mendukung geolocation.";
            }
        }

        function showPosition(position) {
            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;
            document.getElementById('status').textContent = "Lokasi berhasil diambil!";

            // Sembunyikan input alamat manual
            const alamatContainer = document.getElementById('alamat-container');
            if (alamatContainer) {
                alamatContainer.style.display = 'none';
            }

            // Hapus atribut required pada input alamat
            const alamatInput = document.getElementById('alamat');
            if (alamatInput) {
                alamatInput.removeAttribute('required');
            }
        }


        function showError(error) {
            const status = document.getElementById('status');
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    status.textContent = "Anda menolak permintaan lokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    status.textContent = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    status.textContent = "Permintaan lokasi melebihi batas waktu.";
                    break;
                default:
                    status.textContent = "Terjadi kesalahan yang tidak diketahui.";
                    break;
            }
        }
    </script>



    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-white py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="mb-2">WhatsApp: 0812-3456-7890 | Instagram: <a href="https://instagram.com/ushapp.id"
                    class="text-blue-400 hover:underline">@ushapp.id</a></p>
            <p class="text-sm text-gray-400">&copy; 2025 Ushapp. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
