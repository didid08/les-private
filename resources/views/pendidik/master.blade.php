@extends('master')
@section('side-menu')
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'roster-mengajar')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'roster-mengajar' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('pendidik.roster-mengajar') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="ml-4">Roster Mengajar</span>
            </a>
        </li>
    </ul>
    <ul class="mt-3">
        <li class="relative px-6 py-3">
            @if ($pageInfo['id'] == 'jadwal-dan-keahlian')
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'jadwal-dan-keahlian' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('pendidik.jadwal-dan-keahlian') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="ml-4">Jadwal</span>
            </a>
        </li>
    </ul>
    {{-- <div class="px-6 my-8">
        <button
            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Hubungi Admin
            <span class="ml-2" aria-hidden="true"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: inline"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></span>
        </button>
    </div> --}}
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
                    @if ($pageInfo['id'] == 'roster-mengajar')
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'roster-mengajar' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('pendidik.roster-mengajar') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="ml-4">Roster Mengajar</span>
                    </a>
                </li>
            </ul>
            <ul class="mt-3">
                <li class="relative px-6 py-3">
                    @if ($pageInfo['id'] == 'jadwal-dan-keahlian')
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold {{ $pageInfo['id'] == 'jadwal-dan-keahlian' ? 'text-gray-800 dark:text-gray-200 ' : 'text-gray-200 dark:text-gray-100' }}transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="{{ route('pendidik.jadwal-dan-keahlian') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ml-4">Jadwal</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endsection
