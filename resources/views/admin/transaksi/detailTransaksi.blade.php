@extends('template.sideBarAdmin')
@section('sidebar')
    <div>
        <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-10">
            <h2 class="text-2xl font-bold   text-gray-800">Detail Transaksi</h2>
            <h3 class="text-xl font-bold mb-6 text-gray-800">{{ $data->nota }}</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-gray-600 text-sm">Nama Pelanggan</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $data->nama_pelanggan }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">No HP</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $data->no_pelanggan }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">Tanggal Masuk</p>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">Estimasi Selesai</p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ \Carbon\Carbon::parse($data->estimasi_selesai)->format('d M Y') }}</p>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Jumlah Sepatu</p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ $data->jumlah }}</p>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Total Rupiah</p>

                    <p class="text-lg font-semibold text-gray-900">
                        Rp. {{ $data->total_bayar }}</p>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Konfirmasi pesanan</p>

                    <p class="text-lg font-semibold text-gray-900">
                        @if ($data->is_acc == 'Disetujui')
                            <p class="text-lg font-semibold text-green-600">
                                {{ $data->is_acc }}</p>
                        @elseif ($data->is_acc == 'Ditolak')
                            <p class="text-lg font-semibold text-red-600">
                                {{ $data->is_acc }}</p>
                        @else
                            <div class="flex gap-2">
                                <p class="text-lg font-semibold text-yellow-900">
                                    Belum konfirmasi</p>
                                <form action="{{ route('konfirmasi.transaksi', $data->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="is_acc" value="Disetujui" id="">
                                    <button type="submit"
                                        class="text-lg font-semibold text-green-600 bg-green-200 rounded-lg px-1 hover:bg-green-500 hover:text-white cursor-pointer">
                                        Konfirmasi
                                    </button>
                                </form>
                                <form action="{{ route('konfirmasi.transaksi', $data->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="is_acc" value="Ditolak" id="">
                                    <button type="submit"
                                        class="text-lg font-semibold text-red-600 bg-red-200 rounded-lg px-1 hover:bg-red-500 hover:text-white cursor-pointer">
                                        Ditolak
                                    </button>
                                </form>
                            </div>
                        @endif
                    </p>

                </div>
                <div>
                    <p class="text-gray-600 text-sm">Alamat</p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ $data->alamat }}
                    </p>

                    <iframe width="100%" height="300" frameborder="0" style="border:0"
                        src="https://maps.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}&hl=es;z=14&output=embed"
                        allowfullscreen>
                    </iframe>

                </div>

            </div>



            <div class="mt-8">
                <a href="/admin/data-transaksi" class="text-blue-600 hover:underline text-sm">&larr; Kembali ke
                    daftar transaksi</a>
            </div>
        </div>
    </div>
@endsection
