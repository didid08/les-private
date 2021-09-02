@extends('admin.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Daftar Paket Pembelajaran
            </h2>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                <a href="{{ route('admin.paket-pembelajaran.tambah-paket-pembelajaran') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Paket Pembelajaran
                </a>
            </h4>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                @foreach ($semuaPaketPembelajaran->sortBy('kode') as $paketPembelajaran)
                    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="padding-left: 2em"
                        id="paket-{{ $paketPembelajaran->kode }}">
                        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                            {{ $paketPembelajaran->kode }} ({{ $paketPembelajaran->nama }})
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                        <div>
                            <span class="text-gray-600 dark:text-gray-400">Keterangan:</span>
                            <ul class="paket-detail-1 text-gray-600 dark:text-gray-400">
                                @foreach (explode(';', $paketPembelajaran->keterangan) as $keterangan)
                                    <li>{{ $keterangan }}</li>
                                @endforeach
                            </ul>
                            @if ($paketPembelajaran->paketPembelajaranRelationships->count() > 0)
                                <span class="text-gray-600 dark:text-gray-400">Dapat dibeli bersamaan dengan paket:</span>
                                <ul class="paket-detail-2 text-gray-600 dark:text-gray-400">
                                    @foreach ($paketPembelajaran->paketPembelajaranRelationships as $paketPembelajaranRelationship)
                                        <li>
                                            <a class="jump-to"
                                                href="#paket-{{ $paketPembelajaranRelationship->paketPembelajaran->kode }}"
                                                onclick="jumpTo('#paket-{{ $paketPembelajaranRelationship->paketPembelajaran->kode }}')">{{ $paketPembelajaranRelationship->paketPembelajaran->kode }}
                                                ({{ $paketPembelajaranRelationship->paketPembelajaran->nama }})</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="mt-2 mb-4">
                                <span class="text-gray-600 dark:text-gray-400">Harga:
                                    Rp{{ number_format($paketPembelajaran->harga, 2, ',', '.') }} / 12x Pertemuan</span>
                            </div>
                            <div class="mb-4">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Status Paket: </span>
                                @if ($paketPembelajaran->aktif == true)
                                    <span class="text-green-500 dark:text-green-400">Aktif</span>
                                @else
                                    <span class="text-orange-500 dark:text-orange-400">Tidak Aktif</span>
                                @endif
                            </div>
                        </div>
                        </p>
                        <button onclick="window.location.href='{{ route('admin.paket-pembelajaran.edit-paket-pembelajaran', ['id' => $paketPembelajaran->id]) }}';" class="px-4 py-2 mr-1 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Edit Paket
                        </button>
                        <form
                            action="{{ route('admin.paket-pembelajaran.hapus-paket-pembelajaran', ['id' => $paketPembelajaran->id]) }}"
                            method="POST" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah anda yakin?')"
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                Hapus Paket
                            </button>
                        </form>
                    </div>
                @endforeach

                {{-- <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        Colored card
                    </h4>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Fuga, cum commodi a omnis numquam quod? Totam exercitationem
                        quos hic ipsam at qui cum numquam, sed amet ratione! Ratione,
                        nihil dolorum.
                    </p>
                </div> --}}
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

        .jump-from {
            -webkit-transition: border 500ms ease-in-out;
            -moz-transition: border 500ms ease-in-out;
            -o-transition: border 500ms ease-in-out;
        }

        .jump-to:hover {
            color: #1a56db;
        }

    </style>
@endsection

@section('more-script')
    <script>
        let jumpTo = (paketId) => {
            $(paketId).addClass('jump-from shadow-xl');
            setTimeout(function() {
                $(paketId).removeClass('jump-from shadow-xl');
            }, 500);
        };
    </script>
@endsection
