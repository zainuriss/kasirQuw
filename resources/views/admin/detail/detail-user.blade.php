<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail') }} {{ $petugas->nama }}
            </h2>
            <div class="flex flex-row gap-2">
                <x-action-link-button
                    route="{{ route('admin.petugas.index') }}"
                    icon="heroicon-o-arrow-long-left"
                    text="Kembali"
                    gradient="from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800"
                />
                <x-action-link-button
                    route="{{ route('admin.petugas.edit', $petugas->id) }}"
                    icon="feathericon-edit"
                    gradient="from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800"
                />
                
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

