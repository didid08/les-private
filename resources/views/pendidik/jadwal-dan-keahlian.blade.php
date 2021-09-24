@extends('pendidik.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Jadwal
            </h2>
            {{-- <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Jadwal
            </h4> --}}
            <span class="text-sm text-gray mb-2">
                Keterangan:
            </span>
            <span class="text-sm text-gray mb-6 px-2">
                <i class="far fa-circle text-green-600"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Jadwal belum diambil oleh peserta didik
                dan masih bisa diubah/dihapus <br>
                <i class="far fa-check-circle text-green-600"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Jadwal sudah diambil oleh peserta
                didik dan tidak dapat diubah/dihapus lagi dan masa pertemuannya belum mencapai 12X
            </span>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                <button
                    x-on:click="tambahJadwalTerbuka = true; trapCleanup = focusTrap(document.querySelector('#tambah-jadwal'))"
                    class="px-4 py-2 mb-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Jadwal
                </button>
            </h4>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center"></th>
                                <th class="px-4 py-3 text-center">Hari</th>
                                <th class="px-4 py-3 text-center">Pukul</th>
                                <th class="px-4 py-3 text-center" colspan="2">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($semuaJadwalSaya as $jadwal)
                                @if ($jadwal->expired == false)
                                    <tr class="text-gray-700 dark:text-gray-400">

                                        @if ($jadwal->pesertaDidikHasJadwal != null)
                                            @if ($jadwal->pesertaDidikHasJadwal->pesertaDidikHasAbsensi->count() == 12)
                                                <form
                                                    action="{{ route('pendidik.jadwal-dan-keahlian.edit-jadwal', ['id' => $jadwal->id]) }}"
                                                    method="POST">
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        @if ($jadwal->pesertaDidikHasJadwal != null)
                                                            <i class="far fa-check-circle text-green-600"></i>
                                                        @else
                                                            <i class="far fa-circle text-green-600"></i>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        <select
                                                            class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            name="hari">
                                                            <option value="1Senin"
                                                                {{ $jadwal->hari == '1Senin' ? ' selected' : '' }}>
                                                                Senin</option>
                                                            <option value="2Selasa"
                                                                {{ $jadwal->hari == '2Selasa' ? ' selected' : '' }}>Selasa
                                                            </option>
                                                            <option value="3Rabu"
                                                                {{ $jadwal->hari == '3Rabu' ? ' selected' : '' }}>
                                                                Rabu</option>
                                                            <option value="4Kamis"
                                                                {{ $jadwal->hari == '4Kamis' ? ' selected' : '' }}>
                                                                Kamis</option>
                                                            <option value="5Jumat"
                                                                {{ $jadwal->hari == '5Jumat' ? ' selected' : '' }}>
                                                                Jumat</option>
                                                            <option value="6Sabtu"
                                                                {{ $jadwal->hari == '6Sabtu' ? ' selected' : '' }}>
                                                                Sabtu</option>
                                                            <option value="7Minggu"
                                                                {{ $jadwal->hari == '7Minggu' ? ' selected' : '' }}>Minggu
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        <input type="time"
                                                            class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                            id="pukul-mulai" name="pukul_mulai"
                                                            value="{{ date('H:i', strtotime($jadwal->pukul_mulai)) }}">
                                                        &nbsp;&nbsp;s/d&nbsp;&nbsp;
                                                        <input type="time"
                                                            class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                            id="pukul-selesai" name="pukul_selesai"
                                                            value="{{ date('H:i', strtotime($jadwal->pukul_selesai)) }}">
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-right">
                                                        @method('PATCH')
                                                        @csrf
                                                        <button type="submit"
                                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                            Simpan Perubahan
                                                        </button>
                                                    </td>
                                                </form>
                                            @else
                                                <form
                                                    action="{{ route('pendidik.jadwal-dan-keahlian.edit-jadwal', ['id' => $jadwal->id]) }}"
                                                    method="POST">
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        @if ($jadwal->pesertaDidikHasJadwal != null)
                                                            <i class="far fa-check-circle text-green-600"></i>
                                                        @else
                                                            <i class="far fa-circle text-green-600"></i>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        <select
                                                            class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            name="hari" disabled>
                                                            <option value="1Senin"
                                                                {{ $jadwal->hari == '1Senin' ? ' selected' : '' }}>
                                                                Senin</option>
                                                            <option value="2Selasa"
                                                                {{ $jadwal->hari == '2Selasa' ? ' selected' : '' }}>
                                                                Selasa
                                                            </option>
                                                            <option value="3Rabu"
                                                                {{ $jadwal->hari == '3Rabu' ? ' selected' : '' }}>
                                                                Rabu</option>
                                                            <option value="4Kamis"
                                                                {{ $jadwal->hari == '4Kamis' ? ' selected' : '' }}>
                                                                Kamis</option>
                                                            <option value="5Jumat"
                                                                {{ $jadwal->hari == '5Jumat' ? ' selected' : '' }}>
                                                                Jumat</option>
                                                            <option value="6Sabtu"
                                                                {{ $jadwal->hari == '6Sabtu' ? ' selected' : '' }}>
                                                                Sabtu</option>
                                                            <option value="7Minggu"
                                                                {{ $jadwal->hari == '7Minggu' ? ' selected' : '' }}>
                                                                Minggu
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        <input type="time"
                                                            class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                            id="pukul-mulai" name="pukul_mulai"
                                                            value="{{ date('H:i', strtotime($jadwal->pukul_mulai)) }}"
                                                            disabled>
                                                        &nbsp;&nbsp;s/d&nbsp;&nbsp;
                                                        <input type="time"
                                                            class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                            id="pukul-selesai" name="pukul_selesai"
                                                            value="{{ date('H:i', strtotime($jadwal->pukul_selesai)) }}"
                                                            disabled>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-right">
                                                        <button type="button"
                                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                            Lihat Detail Jadwal
                                                        </button>
                                                    </td>
                                                </form>
                                            @endif
                                        @else
                                            <form
                                                action="{{ route('pendidik.jadwal-dan-keahlian.edit-jadwal', ['id' => $jadwal->id]) }}"
                                                method="POST">
                                                <td class="px-4 py-3 text-sm text-center">
                                                    @if ($jadwal->pesertaDidikHasJadwal != null)
                                                        <i class="far fa-check-circle text-green-600"></i>
                                                    @else
                                                        <i class="far fa-circle text-green-600"></i>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 text-sm text-center">
                                                    <select
                                                        class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                        name="hari">
                                                        <option value="1Senin"
                                                            {{ $jadwal->hari == '1Senin' ? ' selected' : '' }}>
                                                            Senin</option>
                                                        <option value="2Selasa"
                                                            {{ $jadwal->hari == '2Selasa' ? ' selected' : '' }}>Selasa
                                                        </option>
                                                        <option value="3Rabu"
                                                            {{ $jadwal->hari == '3Rabu' ? ' selected' : '' }}>
                                                            Rabu</option>
                                                        <option value="4Kamis"
                                                            {{ $jadwal->hari == '4Kamis' ? ' selected' : '' }}>
                                                            Kamis</option>
                                                        <option value="5Jumat"
                                                            {{ $jadwal->hari == '5Jumat' ? ' selected' : '' }}>
                                                            Jumat</option>
                                                        <option value="6Sabtu"
                                                            {{ $jadwal->hari == '6Sabtu' ? ' selected' : '' }}>
                                                            Sabtu</option>
                                                        <option value="7Minggu"
                                                            {{ $jadwal->hari == '7Minggu' ? ' selected' : '' }}>Minggu
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="px-4 py-3 text-sm text-center">
                                                    <input type="time"
                                                        class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                        id="pukul-mulai" name="pukul_mulai"
                                                        value="{{ date('H:i', strtotime($jadwal->pukul_mulai)) }}">
                                                    &nbsp;&nbsp;s/d&nbsp;&nbsp;
                                                    <input type="time"
                                                        class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                        id="pukul-selesai" name="pukul_selesai"
                                                        value="{{ date('H:i', strtotime($jadwal->pukul_selesai)) }}">
                                                </td>
                                                <td class="px-4 py-3 text-sm text-right">
                                                    @method('PATCH')
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                        Simpan Perubahan
                                                    </button>
                                                </td>
                                            </form>
                                        @endif

                                        @if ($jadwal->pesertaDidikHasJadwal != null)
                                            @if ($jadwal->pesertaDidikHasJadwal->pesertaDidikHasAbsensi->count() == 12)
                                                <form
                                                    action="{{ route('pendidik.jadwal-dan-keahlian.hapus-jadwal', ['id' => $jadwal->id]) }}"
                                                    method="POST">
                                                    <td class="px-4 py-3 text-left">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                            onclick="return confirm('Apakah anda yakin?')">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </form>
                                            @else
                                                <td class="px-4 py-3 text-left">

                                                </td>
                                            @endif
                                        @else
                                            <form
                                                action="{{ route('pendidik.jadwal-dan-keahlian.hapus-jadwal', ['id' => $jadwal->id]) }}"
                                                method="POST">
                                                <td class="px-4 py-3 text-left">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                        onclick="return confirm('Apakah anda yakin?')">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </form>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Keahlian
            </h4> --}}
            {{-- <span class="text-sm text-gray mb-2">
                Keterangan:
            </span>
            <span class="text-sm text-gray mb-6 px-2">
                <i class="far fa-circle text-orange-500"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Keahlian belum dipilih <br>
                <i class="far fa-circle text-green-600"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Keahlian sudah dipilih dan masih bisa
                dibatalkan <br>
                <i class="far fa-check-circle text-green-600"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Keahlian sudah dipilih dan tidak
                bisa dibatalkan karena peserta didik yang memiliki paket pembelajaran tsb sudah mengambil jadwal anda untuk
                paket pembelajaran tersebut dan total pertemuan belum mencapai 12X
            </span> --}}
            {{-- <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Paket</th>
                                <th class="px-4 py-3">Keterangan</th>
                                <th class="px-4 py-3">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($semuaPaketPembelajaran as $paket)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $paket->nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <ul class="paket-detail-1 text-gray-600 dark:text-gray-400"
                                            style="list-style-type: circle">
                                            @foreach (explode(';', $paket->keterangan) as $keterangan)
                                                <li>{{ $keterangan }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($paket->pendidikHasPaketPembelajaran->firstWhere('pendidik_id', Auth::id()) == null)
                                            <form
                                                action="{{ route('pendidik.jadwal-dan-keahlian.pilih-keahlian', ['paketID' => $paket->id]) }}"
                                                method="POST" style="display: inline">
                                                @csrf
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                    Pilih
                                                </button>
                                            </form>
                                        @else
                                            <form
                                                action="{{ route('pendidik.jadwal-dan-keahlian.batalkan-keahlian', ['pendidikHasPaketID' => $paket->id]) }}"
                                                method="POST" style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </main>
@endsection

@section('more-x-data')
    tambahJadwalTerbuka: false
@endsection

@section('modal')
    <div x-show="tambahJadwalTerbuka" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="tambahJadwalTerbuka" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2"
            @click.away="tambahJadwalTerbuka = false; trapCleanup = null"
            @keydown.escape="tambahJadwalTerbuka = false; trapCleanup = null"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="tambah-jadwal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" x-on:click="tambahJadwalTerbuka = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <form action="{{ route('pendidik.jadwal-dan-keahlian.tambah-jadwal') }}" method="POST">
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Tambah Jadwal
                    </p>
                    <!-- Modal description -->
                    <p class="py-2 text-sm text-gray-700 dark:text-gray-400 modal-description">
                        @csrf
                        <span class="block text-gray-700 dark:text-gray-400">Hari</span>
                        <select
                            class="block w-full mt-2 mb-4 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="hari">
                            <option value="1Senin">Senin</option>
                            <option value="2Selasa">Selasa</option>
                            <option value="3Rabu">Rabu</option>
                            <option value="4Kamis" selected="">Kamis</option>
                            <option value="5Jumat">Jumat</option>
                            <option value="6Sabtu">Sabtu</option>
                            <option value="7Minggu">Minggu</option>
                        </select>
                        <span class="block text-gray-700 dark:text-gray-400">Pukul</span>
                        <input type="time"
                            class="mt-2 mb-4 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            id="pukul-mulai" name="pukul_mulai">
                        &nbsp;&nbsp;s/d&nbsp;&nbsp;
                        <input type="time"
                            class="mt-2 mb-4 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            id="pukul-selesai" name="pukul_selesai">
                    </p>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button type="button" x-on:click="tambahJadwalTerbuka = false; trapCleanup = null"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Kirim
                    </button>
                </footer>
            </form>
        </div>
    </div>
@endsection
