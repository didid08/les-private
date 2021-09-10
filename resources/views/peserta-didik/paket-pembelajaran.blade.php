@extends('peserta-didik.master')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Paket Pembelajaran
            </h2>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @if ($semuaPembayaranSaya->exists())
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
                                @foreach ($semuaPembayaranSaya->get() as $pembayaran)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                {{ $pembayaran->paketPembelajaran->kode }}
                                                ({{ $pembayaran->paketPembelajaran->nama }})
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            @if ($pembayaran->pembayaranSelesai != null)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Aktif
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-100 dark:text-orange-700">
                                                    Belum Aktif
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{-- <button
                                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Info Pembayaran
                                            </button> --}}
                                            <form
                                                action="{{ route('peserta-didik.paket-pembelajaran.batalkan-paket', ['paketId' => $pembayaran->paket_pembelajaran_id]) }}"
                                                method="POST" style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                                    Batalkan Paket
                                                </button>
                                            </form>
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
            @if ($semuaPembayaranSaya->exists())
                @if ($semuaPembayaranSaya->get()->count() != $totalPembayaranSelesai)
                    <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        <button style="display: inline"
                            x-on:click="infoPembayaranSekaligusTerbuka = true; trapCleanup = focusTrap(document.querySelector('#infoPembayaranSekaligus'))"
                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Bayar Untuk Mengaktifkan Paket
                        </button>
                    </h4>
                @endif
            @endif
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Tambah Paket
            </h4>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                @if (count($paketPembelajaranYangBisaDipilih) != 0)
                    @foreach ($paketPembelajaranYangBisaDipilih as $paketPembelajaran)
                        <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs" style="padding-left: 2em"
                            id="paket-{{ $paketPembelajaran['kode'] }}">
                            <h4 class="mb-4 font-semibold">
                                {{ $paketPembelajaran['kode'] }} ({{ $paketPembelajaran['nama'] }})
                            </h4>
                            <p class="mb-4">
                            <div>
                                <span>Keterangan:</span>
                                <ul class="paket-detail-1">
                                    @foreach (explode(';', $paketPembelajaran['keterangan']) as $keterangan)
                                        <li>{{ $keterangan }}</li>
                                    @endforeach
                                </ul>
                                <div class="mt-2 mb-4">
                                    <span>Harga:
                                        Rp{{ number_format($paketPembelajaran['harga'], 2, ',', '.') }} / 12x
                                        Pertemuan</span>
                                </div>
                            </div>
                            </p>
                            <form
                                action="{{ route('peserta-didik.paket-pembelajaran.tambah-paket', ['paketId' => $paketPembelajaran['id']]) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="padding:0.6em 2em;"
                                    class="font-medium leading-5 text-purple-600 transition-colors duration-150 bg-white border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple">
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
                @else
                    Tidak ada paket pembelajaran yang bisa ditambah
                @endif
            </div>
        </div>
    </main>
@endsection

@section('more-x-data')
    infoPembayaranSekaligusTerbuka: false
@endsection

@section('modal')
    <div x-show="infoPembayaranSekaligusTerbuka" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="infoPembayaranSekaligusTerbuka" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2"
            @click.away="infoPembayaranSekaligusTerbuka = false; trapCleanup = null"
            @keydown.escape="infoPembayaranSekaligusTerbuka = false; trapCleanup = null"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="infoPembayaranSekaligus">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" x-on:click="infoPembayaranSekaligusTerbuka = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Info Pembayaran
                </p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400 modal-description">
                    <br>
                    <b>Kode Pembayaran :</b>
                    <span class="text-purple-600" style="cursor: default;" id="kode-pembayaran-sekaligus">
                        @foreach ($semuaPembayaranSaya->get() as $pembayaran)
                            @if ($pembayaran->pembayaranSelesai == null)
                                {{ $pembayaran->kode_pembayaran }}-
                            @endif
                        @endforeach
                    </span> (<button>Salin Kode</button>)<br>
                    <b>Paket : </b><br>
                    @foreach ($semuaPembayaranSaya->get() as $pembayaran)
                        @if ($pembayaran->pembayaranSelesai == null)
                            - {{ $pembayaran->paketPembelajaran->kode }}
                            ({{ $pembayaran->paketPembelajaran->nama }})<br>
                        @endif
                    @endforeach
                    <br>
                    <b>Total Bayar :</b>
                    @php
                        $totalBayar = 0;
                    @endphp
                    @foreach ($semuaPembayaranSaya->get() as $pembayaran)
                        @if ($pembayaran->pembayaranSelesai == null)
                            @php
                                $totalBayar += $pembayaran->paketPembelajaran->harga;
                            @endphp
                        @endif
                    @endforeach
                    Rp{{ number_format($totalBayar, 2, ',', '.') }}<br>
                    <b>Bayar Ke Rekening BRI:</b> 18128901002 (Ammar)
                    <br><br>
                    Setelah melakukan pembayaran, kirimkan bukti pembayaran berupa <b>Struk</b> serta <b>Kode Pembayaran</b>
                    ke WA Admin (082274608973). <button
                        class="px-3 py-1 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Klik
                        Disini Untuk Langsung Menuju WA Admin</button><br>
                    Setelah pembayaran di approve oleh admin, maka status paket anda menjadi aktif dan anda sudah bisa
                    mengatur jadwal pembelajaran untuk paket tersebut.
                </p>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button x-on:click="infoPembayaranSekaligusTerbuka = false; trapCleanup = null"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Accept
                </button>
            </footer>
        </div>
    </div>
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

        .modal-description {
            max-height: 15em;
            overflow-y: auto;
        }

    </style>
@endsection
@section('more-script')
    <script type="module">
        $("#kode-pembayaran-sekaligus").html($("#kode-pembayaran-sekaligus").html().replace(/\s+/g, '').slice(0, -1));
    </script>
@endsection
