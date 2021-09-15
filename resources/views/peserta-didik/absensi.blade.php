@extends('peserta-didik.master')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Absensi
            </h2>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto p-3">
                    @if ($semuaPembayaranSaya->count() > 0)
                        @php
                            $empty = true;
                        @endphp
                        @foreach ($semuaPembayaranSaya as $pembayaran)
                            @if ($pembayaran->pembayaranSelesai != null)
                                @if ($totalSudahAbsen[$pembayaran->id] < 12)
                                    <h6>Absensi {{ $pembayaran->paketPembelajaran->nama }} Pertemuan Ke-{{ $totalSudahAbsen[$pembayaran->id]+1 }} :</h6>
                                    <button class="px-5 py-3 mt-2 mb-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Absen
                                    </button><br><br><br><br>
                                    @php
                                        $empty = false;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                        @if ($empty == true)
                            Anda tidak memiliki paket pembelajaran yang aktif
                        @endif
                    @else
                        Anda tidak memiliki paket pembelajaran yang aktif
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
