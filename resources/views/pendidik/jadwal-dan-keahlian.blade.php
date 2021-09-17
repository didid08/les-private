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
            <span class="text-sm text-gray mb-2">
                Keterangan:
            </span>
            <span class="text-sm text-gray mb-6 px-2">
                <i class="far fa-circle text-green-600"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Jadwal belum diambil oleh peserta didik
                dan masih bisa diubah <br>
                <i class="far fa-check-circle text-green-600"></i>&nbsp;&nbsp;=&nbsp;&nbsp;Jadwal sudah diambil oleh peserta
                didik dan tidak dapat diubah lagi
            </span>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                <button
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
                                <th class="px-4 py-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($semuaJadwalSaya->sortBy('hari')->sortBy('pukul_mulai') as $jadwal)
                                <form action="{{ route('pendidik.jadwal-dan-keahlian.edit-jadwal', ['id' => $jadwal->id]) }}" method="POST">
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm text-center">
                                            @if ($jadwal->pesertaDidikHasJadwal != null)
                                                <i class="far fa-check-circle text-green-600"></i>
                                            @else
                                                <i class="far fa-circle text-green-600"></i>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            <select
                                                class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari">
                                                <option value="Senin"{{ $jadwal->hari == 'Senin' ? ' selected' : '' }}>Senin</option>
                                                <option value="Selasa"{{ $jadwal->hari == 'Selasa' ? ' selected' : '' }}>Selasa</option>
                                                <option value="Rabu"{{ $jadwal->hari == 'Rabu' ? ' selected' : '' }}>Rabu</option>
                                                <option value="Kamis"{{ $jadwal->hari == 'Kamis' ? ' selected' : '' }}>Kamis</option>
                                                <option value="Jumat"{{ $jadwal->hari == 'Jumat' ? ' selected' : '' }}>Jumat</option>
                                                <option value="Sabtu"{{ $jadwal->hari == 'Sabtu' ? ' selected' : '' }}>Sabtu</option>
                                                <option value="Minggu"{{ $jadwal->hari == 'Minggu' ? ' selected' : '' }}>Minggu</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            <input type="time"
                                                class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                id="pukul-mulai" name="pukul_mulai" value="{{ date('H:i', strtotime($jadwal->pukul_mulai)) }}">
                                            &nbsp;&nbsp;s/d&nbsp;&nbsp;
                                            <input type="time"
                                                class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                                id="pukul-selesai" name="pukul_selesai" value="{{ date('H:i', strtotime($jadwal->pukul_selesai)) }}">
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            @method('PATCH')
                                            @csrf
                                            @if ($jadwal->pesertaDidikHasJadwal != null)
                                                -
                                            @else
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                    Simpan
                                                </button>
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                                    Hapus
                                                </button>
                                            @endif
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
