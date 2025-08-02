@extends('template.sideBarAdmin')
@section('sidebar')
    <section class="bg-white  rounded-lg">
        <div class="py-8 px-4 mx-auto ">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Form tambah transaksi</h2>
            <form action="{{ route('add.transaksi') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-900  ">Pelanggan</label>
                        <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            placeholder="Masukkan nama pelanggan" required="">
                    </div>
                    <div class="w-full">
                        <label for="no_pelanggan" class="block mb-2 text-sm font-medium text-gray-900  ">Nomor HP</label>
                        <input type="text" name="no_pelanggan" id="no_pelanggan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            placeholder="Masukkan nama pelanggan" required="">
                    </div>
                    <div class="w-full">
                        <label for="tgl_masuk" class="block mb-2 text-sm font-medium text-gray-900  ">Tanggal masuk</label>
                        <input type="date" name="tgl_masuk" id="tgl_masuk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            placeholder="$2999" required="">
                    </div>
                    <div class="w-full">
                        <label for="estimasi_selesai" class="block mb-2 text-sm font-medium text-gray-900  ">Estimasi
                            Selesai</label>
                        <input type="date" name="estimasi_selesai" id="estimasi_selesai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            placeholder="$2999" required="">
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900  ">Status bayar</label>
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
                            placeholder="Rp. xxx"  >
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
    </section>
@endsection
