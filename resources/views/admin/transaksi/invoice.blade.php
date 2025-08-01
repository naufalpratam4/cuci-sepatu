<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: monospace;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-white text-black text-sm p-4">
    <div class="max-w-md mx-auto border border-gray-400 p-4">
        <div class="text-center mb-2">
            <h1 class="text-base font-bold">LAUNDRY SEPATU CERIA</h1>
            <p>Jl. Contoh No. 123, Semarang</p>
            <p>Telp: 0812-3456-7890</p>
            <hr class="my-2 border-gray-500">
        </div>

        <div class="mb-2">
            <p class="flex justify-between"><strong>No. Nota:</strong> {{ $transaksi->nota }}</p>
            <p class="flex justify-between"><strong>Tanggal Masuk:</strong> {{ \Carbon\Carbon::parse($transaksi->tgl_masuk)->format('d-m-Y') }}</p>
            <p class="flex justify-between"><strong>Estimasi Selesai:</strong> {{ \Carbon\Carbon::parse($transaksi->estimasi_selesai)->format('d-m-Y') }}</p>
            <p class="flex justify-between"><strong>Nama:</strong> {{ $transaksi->nama_pelanggan }}</p>
        </div>

        <hr class="my-2 border-dashed border-gray-400">

        <div class="mb-2">
            <p class="flex justify-between"><strong>Tipe Sepatu:</strong> {{ $transaksi->tipeSepatu->tipe_sepatu }}</p>
            <p class="flex justify-between"><strong>Harga/Unit:</strong> Rp{{ number_format($transaksi->tipeSepatu->harga, 0, ',', '.') }}</p>
            <p class="flex justify-between"><strong>Jumlah:</strong> {{ $transaksi->jumlah }}</p>
            <p class="flex justify-between"><strong>Diskon:</strong> Rp{{ number_format($transaksi->diskon, 0, ',', '.') }}</p>
        </div>

        <hr class="my-2 border-dashed border-gray-400">

        <div class="text-center mb-2">
            <p><strong>Total Bayar:</strong> Rp{{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
        </div>

        <div class="text-center mt-4">
            <p>--- Terima Kasih ---</p>
        </div>

        <div class="text-center no-print mt-4">
            <a href="{{ url('/admin/dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Kembali
            </a>
            <button onclick="window.print()" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Cetak Struk
            </button>
        </div>
    </div>
</body>

</html>
