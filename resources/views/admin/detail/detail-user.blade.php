<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail') }} {{ $petugas->nama }}
            </h2>
            <div class="flex flex-row gap-2">
                <a href="{{ route('admin.petugas.index') }}" 
                   class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('admin.petugas.edit', $petugas->id) }}" class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-pink-500 to-pink-700 hover:from-pink-600 hover:to-pink-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                        <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2">
                                @foreach ($petugas->only(['nama', 'username', 'email', 'usertype', 'alamat', 'nomor_hp', 'status']) as $key => $value)
                                    <dl>
                                        <dt class="capitalize text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                                            {{ __("{$key}") }}
                                        </dt>
                                        <dd class="mt-1 text-sm font-semibold leading-5 text-gray-900 dark:text-gray-100">
                                            {{ Str::contains($key, 'status') || Str::contains($key, 'usertype') ? Str::ucfirst($value) : $value }}
                                        </dd>
                                    </dl>
                                @endforeach
                            </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

