@extends('peserta-didik.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Roster Pembelajaran
            </h2>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">Hari</th>
                                <th class="px-4 py-3 text-center">Pukul</th>
                                <th class="px-4 py-3 text-center">Pembelajaran</th>
                                <th class="px-4 py-3 text-center">Pendidik</th>
                                <th class="px-4 py-3 text-center">Sisa Pertemuan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php
                                $kosong = true;
                            @endphp
                            @foreach ($semuaJadwalSaya as $jadwal)
                                @if ($jadwal->pesertaDidikHasAbsensi->count() < 12)
                                    @php
                                        $kosong = false;
                                    @endphp
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ substr($jadwal->pendidikHasJadwal->hari, 1) }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ date('H:i', strtotime($jadwal->pendidikHasJadwal->pukul_mulai)) }} s/d
                                            {{ date('H:i', strtotime($jadwal->pendidikHasJadwal->pukul_selesai)) }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ $jadwal->pesertaDidikHasPaketPembelajaran->paketPembelajaran->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ $jadwal->pendidikHasJadwal->pendidik->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            {{ 12 - $jadwal->pesertaDidikHasAbsensi->count() }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if ($kosong == true)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm text-center">
                                        -
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        -
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
