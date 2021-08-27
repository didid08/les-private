@extends('admin.master')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Pendidik
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 w-auto">
                <form action="{{ route('admin.pendidik.edit-pendidik@process', ['id' => $id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input type="text" name="nama"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Nama"
                            value="{{ $nama }}">
                    </label>
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <input type="email" name="email"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Masukkan Email"
                            value="{{ $email }}">
                    </label>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('more-script')

@endsection
