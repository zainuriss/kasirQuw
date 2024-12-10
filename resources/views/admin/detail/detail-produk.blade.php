<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail') }} {{ $produk->nama_produk }}
            </h2>
            <div class="flex flex-row gap-2">
                <x-action-link-button
                    route="{{ route('admin.produk.index') }}"
                    icon="heroicon-o-arrow-long-left"
                    text="Kembali"
                    gradient="from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800"
                />
                <x-action-link-button
                    route="{{ route('admin.produk.edit', $produk->id) }}"
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
                            @foreach ($produk->only(['nama_produk', 'barcode', 'harga_beli', 'harga_jual', 'stok', 'id_category']) as $key => $value)
                                <dl>
                                    <dt class="capitalize text-sm leading-5 font-medium text-gray-500 dark:text-gray-300">
                                        {{ str_replace('_', ' ', ucfirst($key)) }}
                                    </dt>
                                    <dd class="mt-1 text-sm font-semibold capitalize leading-5 text-gray-900 dark:text-gray-100">
                                        @if ($key == 'harga_beli' || $key == 'harga_jual')
                                            Rp. {{ number_format($value, 0, ',', '.') }}
                                        @elseif ($key == 'id_category')
                                        {{ $produk->kategori->id ?? 'N/A' }} : {{ $produk->kategori->nama_kategori ?? 'N/A' }} <!-- Assuming there's a relationship named 'category' -->
                                        @else
                                            {{ str_replace('_', ' ', ucfirst($value)) }}
                                        @endif
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

