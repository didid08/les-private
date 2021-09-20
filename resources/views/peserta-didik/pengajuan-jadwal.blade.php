@extends('peserta-didik.master')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Pengajuan Jadwal
            </h2>
            @foreach ($semuaPaketPembelajaranSaya as $paket)
                <h4 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">Jadwal {{ $paket->paketPembelajaran->nama }}</h4>
                <h4 class="mb-4 text-md font-semibold text-gray-700 dark:text-gray-200">Jadwal Yang Dipilih: -</h4>
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Jadwal</th>
                                    <th class="px-4 py-3 text-center">Pendidik</th>
                                    <th class="px-4 py-3 text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">

                                    </td>
                                    <td class="px-4 py-3 text-xs text-center">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
