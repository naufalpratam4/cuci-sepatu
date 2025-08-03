@extends('template.sideBarAdmin')
@section('sidebar')
<section class="bg-white  rounded-lg">
        <div class="py-8 px-4 mx-auto ">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Form tambah tipe layanan</h2>
            <form action="{{route('update.tipe.sepatu', $data->id)}}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="tipe_sepatu" class="block mb-2 text-sm font-medium text-gray-900  ">Tipe sepatu</label>
                        <input type="text" name="tipe_sepatu" id="tipe_sepatu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            value="{{$data->tipe_sepatu}}" required="">
                    </div>

                    <div>
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900  ">Harga
                            Rp</label>
                        <input type="number" name="harga" id="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            value="{{$data->harga}}" required="">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                    class="inline-flex  items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800 cursor-pointer">
                    Tambah transaksi
                </button>
                </div>
                
            </form>
        </div>
    </section>
@endsection