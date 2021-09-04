@extends('admin.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Status Pembayaran
            </h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4" id="status-pembayaran">
                <div class="w-full overflow-x-auto">
                    <input
                        class="search ml-2 mt-4 mb-4 block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        style="display: inline-block;"
                        placeholder="Cari">

                    <table class="w-full whitespace-no-wrap" id="status-pembayaran-table">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">Kode Pembayaran</th>
                                <th class="px-4 py-3 text-center">Paket Pembelajaran</th>
                                <th class="px-4 py-3">Pembayar</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 list">
                            @foreach ($semuaPembayaran->sortBy('created_at') as $index => $pembayaran)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm text-center kode-pembayaran">
                                        -
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center paket-pembelajaran">
                                        -
                                    </td>
                                    <td class="px-4 py-3 text-sm pembayar">
                                        -
                                    </td>
                                    <td class="px-4 py-3 text-xs text-center status">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-100 dark:text-orange-700">
                                            -
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        <button
                                            class="items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg dark:text-yellow-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="jadikan-sudah-bayar">
                                            <i class="fa fa-history mr-2">Ubah Jadi Sudah Bayar</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                    </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center pagination">

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
            valueNames: ['kode-pembayaran', 'paket-pembelajaran', 'pembayar', 'status'],
            page: 5,
            pagination: true
        };

        var statusPembayaranList = new List('status-pembayaran', options);

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
