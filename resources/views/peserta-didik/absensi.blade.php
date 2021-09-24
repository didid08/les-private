@extends('peserta-didik.master')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Absensi
            </h2>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto p-3">
                    @php
                        $kosong = true;
                    @endphp
                    @foreach ($semuaJadwalSaya as $jadwal)
                        @if ($jadwal->pesertaDidikHasAbsensi->count() < 12)
                            @if (date('H:i') >= $jadwal->pendidikHasJadwal->pukul_mulai && date('H:i') <= $jadwal->pendidikHasJadwal->pukul_selesai && $hariIni == $jadwal->pendidikHasJadwal->hari)

                                @php
                                    $bisaAbsen = true;
                                @endphp
                                @foreach ($jadwal->pesertaDidikHasAbsensi as $absen)
                                    @if (date('Y-m-d', strtotime($absen->created_at)) == date('Y-m-d'))
                                        @php
                                            $bisaAbsen = false;
                                            break;
                                        @endphp
                                    @endif
                                @endforeach

                                @if ($bisaAbsen == true)
                                    @php
                                        $kosong = false;
                                    @endphp

                                    <span class="block text-lg text-gray-700 dark:text-gray-200">
                                        {{ $jadwal->pesertaDidikHasPaketPembelajaran->paketPembelajaran->nama }}
                                    </span>
                                    <span class="block text-md mb-2">(Pertemuan
                                        ke-{{ $jadwal->pesertaDidikHasAbsensi->count() + 1 }})</span>
                                    <form
                                        action="{{ route('peserta-didik.absensi@process', ['jadwalID' => $jadwal->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button
                                            class="mb-8 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Absen
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endif
                    @endforeach
                    @if ($kosong == true)
                        <span class="text-black dark:text-white">Tidak ada absensi untuk sekarang</span>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
