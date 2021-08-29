@extends('admin.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tambah Paket Pembelajaran
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 w-auto">
                <form action="{{ route('admin.paket-pembelajaran.tambah-paket-pembelajaran@process') }}" method="POST">
                    @csrf
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Kode Paket</span>
                        <input type="text" name="kode"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Kode paket">
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Nama Paket</span>
                        <input type="text" name="nama"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Nama paket">
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Keterangan ( Pisahkan dengan tanda ; )</span>
                        <textarea name="keterangan"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Cth: 12x pertemuan;Layanan Konsultasi;dll"></textarea>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Harga Paket (Rp)</span>
                        <!-- focus-within sets the color for the icon when input is focused -->
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <input name="harga-paket" type="number"
                                class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                placeholder="Cth: 50000">
                            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                    </label>
                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Bisa dengan diambil secara bersamaan dengan paket :
                        </span>
                        <div class="mt-2 mb-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:border-gray-600"
                            style="max-height: 20em; overflow-y: auto">
                            @foreach ($semuaPaketPembelajaran->sortBy('kode') as $paketPembelajaran)
                                <label class="mb-2 inline-flex items-center text-gray-600 dark:text-gray-400"
                                    style="display: block;">
                                    <input type="checkbox" class="form-checkbox" value="{{ $paketPembelajaran->id }}">
                                    <span
                                        class="ml-2 mr-6">{{ $paketPembelajaran->kode }}&nbsp;&nbsp;({{ $paketPembelajaran->nama }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('more-script')

@endsection
