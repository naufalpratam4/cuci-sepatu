@extends('template.sideBarAdmin')
@section('sidebar')
    <section class="  ">
        <div class="mx-auto max-w-screen-xl px-4  ">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="ps-4 pt-4 text-xl font-bold">Data Transaksi</div>
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('search.transaksi') }}" method="GET" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500  " fill="currentColor"
                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2  "
                                    placeholder="Cari nota pelanggan"  >

                            </div>
                            <button class="px-4 py-2 border border-gray-300 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-r-md transition cursor-pointer">search</button>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2   focus:outline-none  ">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add product
                        </button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <a href="/admin/tambah-transaksi">
                                <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-pointer "
                                    type="button">

                                    Tambah Transaksi
                                </button>
                            </a>


                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-pointer "
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow  ">
                                <h6 class="mb-3 text-sm font-medium text-gray-900  ">Choose brand</h6>
                                <ul class="space-y-2 text-sm " aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500  ">
                                        <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900  ">Microsoft
                                            (16)</label>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500  ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50   ">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nota</th>
                                <th scope="col" class="px-4 py-3">Nama Pelanggan</th>
                                <th scope="col" class="px-4 py-3">Nomor HP</th>
                                <th scope="col" class="px-4 py-3">Tanggal Masuk</th>
                                <th scope="col" class="px-4 py-3">Jumlah</th>
                                <th scope="col" class="px-4 py-3">status</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $no => $item)
                                <tr class="border-b  text-center ">
                                    <td class="px-4 py-3">{{ $no + 1 }}</td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap  ">
                                        {{ $item->nota }}</th>
                                    <td class="px-4 py-3">{{ $item->nama_pelanggan }}</td>
                                    <td class="px-4 py-3">{{ $item->no_pelanggan }}</td>
                                    <td class="px-4 py-3">{{ $item->tgl_masuk }}</td>
                                    <td class="px-4 py-3">{{ $item->jumlah }}</td>
                                    <td class="px-4 py-3">{{ $item->is_acc }}</td>


                                    <td class="px-4 py-3">
                                        <div class="flex  ">
                                            {{-- Tombol Detail --}}
                                            <a href="{{ route('detail.transaksi', $item->id) }}"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-md transition">
                                                Detail
                                            </a>
                                            @if ($item->is_acc == 'Ditolak')
                                                <a href="https://wa.me/{{ $item->no_pelanggan }}" target="_blank"
                                                    class="py-2 ps-2 text-green-500 hover:underline">
                                                    Hubungi via WA
                                                </a>

                                                <form action="{{ route('delete.transaksi', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="text-red-500 ps-2 py-2 cursor-pointer hover:underline">Hapus</button>
                                                </form>
                                            @elseif($item->is_acc == 'Disetujui')
                                                <a href="https://wa.me/{{ $item->no_pelanggan }}" target="_blank"
                                                    class="py-2 ps-2 text-green-500 hover:underline">
                                                    Hubungi via WA
                                                </a>
                                                <form action="{{ route('delete.transaksi', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="text-red-500 ps-2 py-2 cursor-pointer hover:underline">Hapus</button>
                                                </form>
                                            @endif


                                            {{-- Jika belum disetujui atau ditolak --}}
                                            @if ($item->is_acc != 'Disetujui' && $item->is_acc != 'Ditolak')
                                                {{-- Tombol Konfirmasi --}}
                                                <form action="{{ route('konfirmasi.transaksi', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="is_acc" value="Disetujui">
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-md transition cursor-pointer">
                                                        Konfirmasi
                                                    </button>
                                                </form>

                                                {{-- Tombol Tolak --}}
                                                <form action="{{ route('konfirmasi.transaksi', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="is_acc" value="Ditolak">
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-md transition cursor-pointer">
                                                        Tolak
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="mt-2">
                {{ $data->links() }}
            </div>
        </div>
    </section>
@endsection
