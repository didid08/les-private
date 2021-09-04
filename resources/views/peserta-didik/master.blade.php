@extends('master')
@section('side-menu')
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'roster-pembelajaran')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="ml-4">Roster Pembelajaran</span>
            </a>
        </li>
    </ul>
    <ul class="mt-3">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'pengaturan-jadwal')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <span class="ml-4">Pengaturan Jadwal</span>
            </a>
        </li>
    </ul>
    <ul class="mt-3">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'paket-pembelajaran')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <span class="ml-4">Paket Pembelajaran</span>
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
                Jak U Rumoh
            </a>

            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    @if ($pageInfo['id'] == 'dashboard')
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'dashboard' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="">
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

        </div>
    </aside>
@endsection
