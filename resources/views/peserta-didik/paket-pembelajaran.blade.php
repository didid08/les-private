@extends('peserta-didik.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Paket Pembelajaran
            </h2>
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
                        <div class="bg-white text-black rounded-lg" style="display: inline-block; padding: 0.5em 1em">
                            <label class="flex items-center">
                                <input type="checkbox" name="aktif" value="aktif" style="border-color: #7e3af2"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <span class="ml-2" title="Memungkinkan paket bisa dibeli">Tambahkan Ke Keranjang</span>
                            </label>
                        </div>
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
