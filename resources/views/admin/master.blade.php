@extends('master')
@section('side-menu')
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'dashboard')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('admin.dashboard') }}">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">Dashboard</span>
            </a>
        </li>
    </ul>

    <ul class="mt-3">
        <li class="relative px-6 py-3"
            x-data="{ isPendidikMenuOpen: {{ $pageInfo['group'] == 'pendidik' ? 'true' : 'false' }} }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                x-on:click="isPendidikMenuOpen = !isPendidikMenuOpen" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="ml-4">Pendidik</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <template x-if="isPendidikMenuOpen">
                <ul x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    <li
                        class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.pendidik.daftar-pendidik') }}">Daftar Pendidik</a>
                    </li>
                    @if ($pageInfo['id'] == 'edit-pendidik')
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'edit-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('admin.pendidik.edit-pendidik', ['id' => $id]) }}">Edit Pendidik</a>
                        </li>
                    @endif
                    <li
                        class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.pendidik.tambah-pendidik') }}">Tambah Pendidik</a>
                    </li>
                </ul>
            </template>
        </li>
    </ul>

    <ul class="mt-3">
        <li class="relative px-6 py-3"
            x-data="{ isPesertaDidikMenuOpen: {{ $pageInfo['group'] == 'peserta-didik' ? 'true' : 'false' }} }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                x-on:click="isPesertaDidikMenuOpen = !isPesertaDidikMenuOpen" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <i class="fas fa-users"></i>
                    <span class="ml-4">Peserta Didik</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <template x-if="isPesertaDidikMenuOpen">
                <ul x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    <li
                        class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.peserta-didik.daftar-peserta-didik') }}">Daftar Peserta Didik</a>
                    </li>
                    @if ($pageInfo['id'] == 'edit-peserta-didik')
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'edit-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('admin.peserta-didik.edit-peserta-didik', ['id' => $id]) }}">Edit Peserta Didik</a>
                        </li>
                    @endif
                    <li
                        class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.peserta-didik.tambah-peserta-didik') }}">Tambah Peserta Didik</a>
                    </li>
                </ul>
            </template>
        </li>
    </ul>

    <ul class="mt-3">
        <li class="relative px-6 py-3"
            x-data="{ isPaketPembelajaranMenuOpen: {{ $pageInfo['group'] == 'paket-pembelajaran' ? 'true' : 'false' }} }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                x-on:click="isPaketPembelajaranMenuOpen = !isPaketPembelajaranMenuOpen" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <i class="fas fa-cube"></i>
                    <span class="ml-4">Paket Pembelajaran</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <template x-if="isPaketPembelajaranMenuOpen">
                <ul x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    <li
                        class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-paket-pembelajaran' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.paket-pembelajaran.daftar-paket-pembelajaran') }}">Daftar Paket</a>
                    </li>
                    @if ($pageInfo['id'] == 'edit-paket-pembelajaran')
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'edit-paket-pembelajaran' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('admin.paket-pembelajaran.edit-paket-pembelajaran', ['id' => $paketPembelajaranSekarang->id]) }}">Edit Paket</a>
                        </li>
                    @endif
                    <li
                        class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-paket-pembelajaran' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.paket-pembelajaran.tambah-paket-pembelajaran') }}">Tambah Paket</a>
                    </li>
                </ul>
            </template>
        </li>
    </ul>

    <ul class="mt-3">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'aktifkan-paket-peserta-didik')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'aktifkan-paket-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('admin.konfirmasi-pembayaran') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="ml-4">Konfirmasi Pembayaran</span>
            </a>
        </li>
    </ul>
@endsection
@section('side-menu-mobile')
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Jak-U-Rumoh
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    @if ($pageInfo['id'] == 'dashboard')
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.dashboard') }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>

            <ul class="mt-3">
                <li class="relative px-6 py-3"
                    x-data="{ isPendidikMenuOpen: {{ $pageInfo['group'] == 'pendidik' ? 'true' : 'false' }} }">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        x-on:click="isPendidikMenuOpen = !isPendidikMenuOpen" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span class="ml-4">Pendidik</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isPendidikMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin.pendidik.daftar-pendidik') }}">Daftar Pendidik</a>
                            </li>
                            @if ($pageInfo['id'] == 'edit-pendidik')
                                <li
                                    class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'edit-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('admin.pendidik.edit-pendidik', ['id' => $id]) }}">Edit Pendidik</a>
                                </li>
                            @endif
                            <li
                                class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin.pendidik.tambah-pendidik') }}">Tambah Pendidik</a>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>

            <ul class="mt-3">
                <li class="relative px-6 py-3"
                    x-data="{ isPesertaDidikMenuOpen: {{ $pageInfo['group'] == 'peserta-didik' ? 'true' : 'false' }} }">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        x-on:click="isPesertaDidikMenuOpen = !isPesertaDidikMenuOpen" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <i class="fas fa-users"></i>
                            <span class="ml-4">Peserta Didik</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isPesertaDidikMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin.peserta-didik.daftar-peserta-didik') }}">Daftar Peserta Didik</a>
                            </li>
                            @if ($pageInfo['id'] == 'edit-peserta-didik')
                                <li
                                    class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'edit-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('admin.peserta-didik.edit-peserta-didik', ['id' => $id]) }}">Edit Peserta Didik</a>
                                </li>
                            @endif
                            <li
                                class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin.peserta-didik.tambah-peserta-didik') }}">Tambah Peserta Didik</a>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>

            <ul class="mt-3">
                <li class="relative px-6 py-3"
                    x-data="{ isPaketPembelajaranMenuOpen: {{ $pageInfo['group'] == 'paket-pembelajaran' ? 'true' : 'false' }} }">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        x-on:click="isPaketPembelajaranMenuOpen = !isPaketPembelajaranMenuOpen" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <i class="fas fa-cube"></i>
                            <span class="ml-4">Paket Pembelajaran</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isPaketPembelajaranMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-paket-pembelajaran' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin.paket-pembelajaran.daftar-paket-pembelajaran') }}">Daftar Paket</a>
                            </li>
                            @if ($pageInfo['id'] == 'edit-paket-pembelajaran')
                                <li
                                    class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'edit-paket-pembelajaran' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('admin.paket-pembelajaran.edit-paket-pembelajaran', ['id' => $paketPembelajaranSekarang->id]) }}">Edit Paket</a>
                                </li>
                            @endif
                            <li
                                class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-paket-pembelajaran' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="{{ route('admin.paket-pembelajaran.tambah-paket-pembelajaran') }}">Tambah Paket</a>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>

            <ul class="mt-3">
                <li class="relative px-6 py-3">
                    @if ($pageInfo['id'] == 'aktifkan-paket-peserta-didik')
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'aktifkan-paket-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('admin.konfirmasi-pembayaran') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-4">Konfirmasi Pembayaran</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endsection
