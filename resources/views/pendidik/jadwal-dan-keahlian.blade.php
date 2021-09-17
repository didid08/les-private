@extends('pendidik.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Jadwal & Keahlian
            </h2>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Jadwal
            </h4>
            <span class="text-sm text-gray mb-6 px-2">
                <svg class="w-4 h-4 text-green-600" style="display: inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> =
                Jadwal sudah diambil oleh peserta didik dan tidak dapat diubah lagi
            </span>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center"></th>
                                <th class="px-4 py-3">Hari</th>
                                <th class="px-4 py-3 text-center">Pukul</th>
                                <th class="px-4 py-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <form action="{{ route('pendidik.jadwal-dan-keahlian.simpan-jadwal') }}" method="POST">
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm text-center text-green-600">
                                            <svg class="w-4 h-4" style="display: inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $hari }}
                                            <input type="hidden" name="hari" value="{{ $hari }}">
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            <input type="time"
                                                class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                id="pukul-mulai" name="pukul_mulai">
                                            &nbsp;&nbsp;s/d&nbsp;&nbsp;
                                            <input type="time"
                                                class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                id="pukul-selesai" name="pukul_selesai">
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Simpan
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Keahlian
            </h4>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                </div>
            </div>
        </div>
    </main>
@endsection
