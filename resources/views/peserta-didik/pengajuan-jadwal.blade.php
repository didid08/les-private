@extends('peserta-didik.master')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Pengajuan Jadwal
            </h2>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Paket</th>
                                <th class="px-4 py-3 text-center">Jadwal & Pendidik</th>
                                <th class="px-4 py-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $kosong = true;
                            @endphp
                            @foreach ($semuaPaketPembelajaranSaya as $paket)
                                @if ($paket->pesertaDidikHasJadwal == null)
                                    @php
                                        $kosong = false;
                                    @endphp
                                    <form action="{{ route('peserta-didik.pengajuan-jadwal@process') }}" method="POST">
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm">
                                                @csrf
                                                <input type="hidden" name="pesertaDidikHasPaketPembelajaranID"
                                                    value="{{ $paket->id }}">
                                                {{ $paket->paketPembelajaran->nama }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center">
                                                <select
                                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                    name="pendidikHasJadwalID">
                                                    @foreach ($semuaJadwalPendidik as $jadwal)
                                                        @if ($jadwal->pesertaDidikHasJadwal == null)
                                                            <option value="{{ $jadwal->id }}">
                                                                {{ substr($jadwal->hari, 1) }}
                                                                {{ date('H:i', strtotime($jadwal->pukul_mulai)) }} s/d
                                                                {{ date('H:i', strtotime($jadwal->pukul_selesai)) }} (
                                                                Pendidik: {{ $jadwal->pendidik->nama }} )</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center">
                                                <button type="submit"
                                                    onclick="return confirm('Apakah anda yakin? Aksi ini tidak bisa dibatalkan')"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                    Ajukan
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                    @if ($kosong == true)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm">
                                                -
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center">
                                                -
                                            </td>
                                            <td class="px-4 py-3 text-sm text-center">
                                                -
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
