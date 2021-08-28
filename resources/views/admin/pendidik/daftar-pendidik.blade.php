@extends('admin.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Daftar Pendidik
            </h2>
            <h4 class="mb-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
                <a href="{{ route('admin.pendidik.tambah-pendidik') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Pendidik
                </a>
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4" id="daftar-pendidik">
                <div class="w-full overflow-x-auto">
                    <input
                        class="search ml-2 mt-4 mb-4 block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        style="display: inline-block;"
                        placeholder="Cari Pendidik">

                    <table class="w-full whitespace-no-wrap" id="daftar-pendidik-table">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 list">
                            @foreach ($semuaPendidik as $index => $pendidik)

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 nama">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $pendidik->nama }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    <a href="mailto:{{ $pendidik->email }}">{{ $pendidik->email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs text-center status">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-100 dark:text-orange-700">
                                            Sedang Mengajar
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-sm text-center">
                                        <a href="{{ route('admin.pendidik.edit-pendidik', ['id' => $pendidik->id]) }}"
                                            class="items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <i class="fa fa-edit mr-2"></i>Edit
                                        </a>
                                        <button
                                            class="items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg dark:text-yellow-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Reset Password">
                                            <i class="fa fa-history mr-2"></i>Reset Pass
                                        </button>
                                        <form
                                            action="{{ route('admin.pendidik.hapus-pendidik', ['id' => $pendidik->id]) }}"
                                            method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-red-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus pendidik ini?')">
                                                <i class="fa fa-trash mr-2"></i>Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">{{-- Showing&nbsp;<span id="first-item-number"></span>-<span id="last-item-number"></span>&nbsp;of {{ $semua_pendidik->count() }} --}}
                    </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center pagination">
                                {{-- <li>
                                    <button
                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Previous">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li> --}}
                                {{-- <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        1
                                    </button>
                                </li> --}}
                                {{-- <li>
                                    <button
                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Next">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li> --}}
                            </ul>
                        </nav>
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('more-css')
    <style>
        .pagination li {
            margin-right: 0.5em;
        }
        .pagination li a{

        }
    </style>
@endsection

@section('more-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script type="module">
        var options = {
            valueNames: ['nama', 'status'],
            page: 5,
            pagination: true
        };

        var daftarPendidikList = new List('daftar-pendidik', options);

        let pageActive = 1

        function handlePaginationStyle () {
            $(".pagination li").addClass("px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple");
            $(".pagination li").each(function () {
                if ($(this).text() == pageActive) {
                    $(this).addClass("text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600")
                }
                $(this).find("a").click(function () {
                    let thisValueToInt = parseInt($(this).text())
                    pageActive = thisValueToInt
                });
            });
        }

        handlePaginationStyle()

        MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
        var observer = new MutationObserver(function(mutations, observer) {
            handlePaginationStyle()
        });
        observer.observe(document, {
            subtree: true,
            attributes: true
        });
    </script>
@endsection
