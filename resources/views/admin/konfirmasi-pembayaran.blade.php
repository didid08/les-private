@extends('admin.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Konfirmasi Pembayaran
            </h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4" id="status-pembayaran">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap" id="status-pembayaran-table">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama Peserta Didik</th>
                                <th class="px-4 py-3">Paket Pembelajaran</th>
                                <th class="px-4 py-3">Total Bayar</th>
                                <th class="px-4 py-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 list">
                            {{-- Gabungkan kode pembayaran jika lebih dari 1 --}}
                            @php
                                $listPembayaran = [];
                            @endphp
                            @foreach ($semuaPembayaran->sortBy('created_at') as $index => $pembayaran)
                                @if ($pembayaran->pembayaranSelesai == null)
                                    @if (array_key_exists($pembayaran->user->email, $listPembayaran))
                                        @php
                                            $listPembayaran[$pembayaran->user->email] = [
                                                'nama' => $pembayaran->user->nama,
                                                'paket_pembelajaran' => $listPembayaran[$pembayaran->user->email]['paket_pembelajaran'].'~'.$pembayaran->paketPembelajaran->nama,
                                                'harga' => $listPembayaran[$pembayaran->user->email]['harga'].'~'.$pembayaran->paketPembelajaran->harga
                                            ];
                                        @endphp
                                    @else
                                        @php
                                            $listPembayaran[$pembayaran->user->email] = [
                                                'nama' => $pembayaran->user->nama,
                                                'paket_pembelajaran' => $pembayaran->paketPembelajaran->nama,
                                                'harga' => $pembayaran->paketPembelajaran->harga
                                            ];
                                        @endphp
                                    @endif
                                @endif
                            @endforeach

                            {{-- Kemudian, iterate kan --}}
                            @foreach ($listPembayaran as $email => $pembayaran)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm nama">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $pembayaran['nama'] }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm paket-pembelajaran">
                                        @foreach (explode('~', $pembayaran['paket_pembelajaran']) as $paketPembelajaran)
                                            - {{ $paketPembelajaran }}<br>
                                        @endforeach
                                    </td>

                                    <td class="px-4 py-3 text-sm harga">
                                        @php
                                            $totalBayar = 0;
                                        @endphp
                                        @foreach (explode('~', $pembayaran['harga']) as $harga)
                                            @php
                                                $totalBayar += $harga;
                                            @endphp
                                        @endforeach
                                        Rp{{ number_format($totalBayar, 2, ',', '.') }}
                                    </td>

                                    {{-- <td class="px-4 py-3 text-xs text-center status">

                                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-100 dark:text-orange-700">
                                            {{ $pembayaran['status'] }}
                                        </span>
                                    </td> --}}
                                    <td class="px-4 py-3 text-sm text-center">
                                        <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Konfirmasi
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('more-css')
    <style>
        .pagination li {
            margin-right: 0.5em;
        }
        .pagination li a{

        }
    </style>
@endsection

@section('more-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>

@endsection
