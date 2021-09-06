@extends('peserta-didik.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Paket Pembelajaran
            </h2>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Paket Yang Sudah Dibeli
            </h4>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama Paket</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Sisa Pertemuan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt="" loading="lazy">
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Hans Burger</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                10x Developer
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Approved
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    6/10/2020
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Pembelian Paket
            </h4>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                @foreach ($semuaPaketPembelajaran->sortBy('kode') as $paketPembelajaran)
                    <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs" style="padding-left: 2em"
                        id="paket-{{ $paketPembelajaran->kode }}">
                        <h4 class="mb-4 font-semibold">
                            [ {{ $paketPembelajaran->kode }} ({{ $paketPembelajaran->nama }}) ]
                        </h4>
                        <p class="mb-4">
                        <div>
                            <span>Keterangan:</span>
                            <ul class="paket-detail-1">
                                @foreach (explode(';', $paketPembelajaran->keterangan) as $keterangan)
                                    <li>{{ $keterangan }}</li>
                                @endforeach
                            </ul>
                            <div class="mt-2 mb-4">
                                <span>Harga:
                                    Rp{{ number_format($paketPembelajaran->harga, 2, ',', '.') }} / 12x Pertemuan</span>
                            </div>
                        </div>
                        </p>
                        <button style="padding:0.6em 3em;"
                            class="font-medium leading-5 text-purple-600 transition-colors duration-150 bg-white border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple">
                            Beli
                        </button>
                        {{-- <div class="bg-white text-black rounded-lg" style="display: inline-block; padding: 0.5em 1em">
                            <label class="flex items-center">
                                <input type="checkbox" name="aktif" value="aktif" style="border-color: #7e3af2"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <span class="ml-2" title="Memungkinkan paket bisa dibeli">Tambahkan Ke Keranjang</span>
                            </label>
                        </div> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
@section('more-css')
    <style>
        .paket-detail-1 {
            margin-top: 0.4em;
            margin-bottom: 1em;
            list-style-type: circle;
            padding-left: 1em;
        }

        .paket-detail-2 {
            margin-top: 0.4em;
            margin-bottom: 0.8em;
            list-style-type: circle;
            padding-left: 1em;
        }

    </style>
@endsection
