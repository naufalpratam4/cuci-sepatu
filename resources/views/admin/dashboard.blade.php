@extends('template.sideBarAdmin')
@section('sidebar')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="flex flex-col justify-center items-center p-4 bg-white rounded-lg shadow">
                <p class="text-gray-500">Total Transaksi</p>
                <h2 class="text-2xl font-bold text-blue-600">{{ $totalTransaksi }}</h2>
            </div>
            <div class="flex flex-col justify-center items-center p-4 bg-white rounded-lg shadow">
                <p class="text-gray-500">Disetujui</p>
                <h2 class="text-2xl font-bold text-green-600">{{ $diterima }}</h2>
            </div>
            <div class="flex flex-col justify-center items-center p-4 bg-white rounded-lg shadow">
                <p class="text-gray-500">Ditolak</p>
                <h2 class="text-2xl font-bold text-red-600">{{ $ditolak }}</h2>
            </div>
            <div class="flex flex-col justify-center items-center p-4 bg-white rounded-lg shadow">
                <p class="text-gray-500">Total Pemasukan</p>
                <h2 class="text-2xl font-bold text-green-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h2>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Statistik Transaksi per Bulan</h3>
            <canvas id="transaksiChart" height="100"></canvas>
        </div>
        {{-- Tombol tambah transaksi & ringkasan keuangan --}}
        <div class="grid md:grid-cols-2 pt-6 gap-4 mb-6">
            <div class="bg-white py-6 rounded-lg shadow flex items-center justify-center">
                <div class="">
                    <form action="{{ route('add.transaksi') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="nama_pelanggan"
                                    class="block mb-2 text-sm font-medium text-gray-900  ">Pelanggan</label>
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                    placeholder="Masukkan nama pelanggan" required="">
                            </div>
                            <div class="w-full">
                                <label for="no_pelanggan" class="block mb-2 text-sm font-medium text-gray-900  ">Nomor
                                    HP</label>
                                <input type="text" name="no_pelanggan" id="no_pelanggan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                    placeholder="Masukkan nama pelanggan" required="">
                            </div>
                            <div class="w-full">
                                <label for="tgl_masuk" class="block mb-2 text-sm font-medium text-gray-900  ">Tanggal
                                    masuk</label>
                                <input type="date" name="tgl_masuk" id="tgl_masuk"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                    placeholder="$2999" required="">
                            </div>
                            <div class="w-full">
                                <label for="estimasi_selesai"
                                    class="block mb-2 text-sm font-medium text-gray-900  ">Estimasi
                                    Selesai</label>
                                <input type="date" name="estimasi_selesai" id="estimasi_selesai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                    placeholder="$2999" required="">
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900  ">Status
                                    bayar</label>
                                <select id="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                                    <option value="" disabled selected>-- Pilih Status Bayar --</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="belum">Belum</option>
                                    <option value="dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="tipe_sepatu_id" class="block mb-2 text-sm font-medium text-gray-900">
                                    Tipe Layanan
                                </label>
                                <select id="tipe_sepatu_id" name="tipe_sepatu_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                    <option value="" disabled selected>-- Pilih layanan --</option>
                                    @foreach ($tipeSepatu as $item)
                                        <option value="{{ $item->id }}">{{ $item->tipe_sepatu }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="diskon" class="block mb-2 text-sm font-medium text-gray-900  ">Diskon
                                    Rp</label>
                                <input type="number" name="diskon" id="diskon"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                    placeholder="Rp. xxx">
                            </div>
                            <div>
                                <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900  ">Jumlah
                                    Sepatu</label>
                                <input type="number" name="jumlah" id="jumlah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                    placeholder="Jml Sepatu" required="">
                            </div>


                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200   hover:bg-blue-800 cursor-pointer">
                            Tambah transaksi
                        </button>
                    </form>
                </div>
                
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-600 mb-3">Transaksi Terbaru</h3>
                <ul class="divide-y divide-gray-200 max-h-52 overflow-auto">
                    @forelse ($transaksiTerkini as $trx)
                        <li class="py-2 flex justify-between items-center text-sm">
                            <span>{{ $trx->nama_pelanggan }}</span>
                            <span class="text-gray-500">{{ \Carbon\Carbon::parse($trx->tgl_masuk)->format('d M') }}</span>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">Belum ada transaksi.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('transaksiChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(
                    $monthlyTransaksi->pluck('bulan')->map(fn($b) => DateTime::createFromFormat('!m', $b)->format('F')),
                ) !!},
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: {!! json_encode($monthlyTransaksi->pluck('total')) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.6)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection
