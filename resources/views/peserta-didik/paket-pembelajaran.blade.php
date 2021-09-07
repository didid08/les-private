@extends('peserta-didik.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Paket Pembelajaran
            </h2>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @if ($semuaPembayaran->exists())
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nama Paket</th>
                                    <th class="px-4 py-3 text-center">Status</th>
                                    <th class="px-4 py-3 text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($semuaPembayaran->get() as $pembayaran)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                {{ $pembayaran->paketPembelajaran->kode }} ({{ $pembayaran->paketPembelajaran->nama }})
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            @if ($pembayaran->pembayaranSelesai != null)
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-100 dark:text-orange-700">
                                                    Belum Bayar
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                                Lihat Info Pembayaran
                                            </button>
                                            <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                                Batalkan Paket
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-black dark:text-white">Belum ada paket. Silahkan lakukan penambahan paket.</div>
                    @endif
                </div>
            </div>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Tambah Paket
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
                        <form action="{{ route('peserta-didik.paket-pembelajaran.tambah-paket', ['paketId' => $paketPembelajaran->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="padding:0.6em 2em;" class="font-medium leading-5 text-purple-600 transition-colors duration-150 bg-white border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple">
                                Tambah
                            </button>
                        </form>
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
