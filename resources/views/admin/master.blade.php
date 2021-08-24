@extends('master')
@section('side-menu')
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'dashboard')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : '' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
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

    <ul>
        <li class="relative px-6 py-3" x-data="{ isPendidikMenuOpen: {{ $pageInfo['group'] == 'pendidik' ? 'true' : 'false' }} }">
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
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="{{ route('admin.pendidik.daftar-pendidik') }}">Daftar Pendidik</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="requestpendidik.php">Tambah Pendidik</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'roster-pendidik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="requestpendidik.php">Roster Pendidik</a>
                    </li>
                </ul>
            </template>
        </li>

        <li class="relative px-6 py-3" x-data="{ isPesertaDidikMenuOpen: {{ $pageInfo['group'] == 'peserta-didik' ? 'true' : 'false' }} }">
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
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="daftarpesertadidik.php">Daftar Peserta Didik</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="requestpesertadidik.php">Tambah Peserta Didik</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'roster-peserta-didik' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="requestpesertadidik.php">Roster Peserta Didik</a>
                    </li>
                </ul>
            </template>
        </li>

        <li class="relative px-6 py-3" x-data="{ isPaketPembelajaranMenuOpen: {{ $pageInfo['group'] == 'paket-pembelajaran' ? 'true' : 'false' }} }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                x-on:click="isPaketPembelajaranMenuOpen = !isPaketPembelajaranMenuOpen" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <i class="fas fa-cube"></i>
                    <span class="ml-4">Paket Pembelajaran</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M239.1 6.3l-208 78c-18.7 7-31.1 25-31.1 45v225.1c0 18.2 10.3 34.8 26.5 42.9l208 104c13.5 6.8 29.4 6.8 42.9 0l208-104c16.3-8.1 26.5-24.8 26.5-42.9V129.3c0-20-12.4-37.9-31.1-44.9l-208-78C262 2.2 250 2.2 239.1 6.3zM256 68.4l192 72v1.1l-192 78-192-78v-1.1l192-72zm32 356V275.5l160-65v133.9l-160 80z"
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
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'daftar-paket' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="daftarpendidik.php">Daftar Paket</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 {{ $pageInfo['id'] == 'tambah-paket' ? 'text-gray-800 dark:text-gray-200 ' : '' }}hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="requestpendidik.php">Tambah Paket</a>
                    </li>
                </ul>
            </template>
        </li>
    </ul>
@endsection
