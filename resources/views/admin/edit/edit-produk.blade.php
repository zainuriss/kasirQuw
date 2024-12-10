<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <x-action-link-button
                    route="{{ route('admin.produk.index') }}"
                    icon="heroicon-o-arrow-long-left"
                    text="Kembali"
                    gradient="from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800"
                />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.produk.update', $produk->id) }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <x-text-input id="usertype" type="hidden" name="usertype"/>
                            <div>
                                <x-input-label for="nama_produk" :value="__('Nama Produk')" />
                                <x-text-input id="nama_produk" class="mt-1 block w-full" type="text" name="nama_produk" :value="old('nama_produk', $produk->nama_produk)" required autofocus autocomplete="nama_produk" />
                                <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="barcode" :value="__('Barcode')" />
                                <x-text-input id="barcode" class="mt-1 block w-full" type="text" name="barcode" :value="old('barcode', $produk->barcode)" required autofocus autocomplete="barcode" />
                                <x-input-error :messages="$errors->get('barcode')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="harga_beli" :value="__('Harga Beli')" />
                                <x-text-input id="harga_beli" class="mt-1 block w-full" type="text" name="harga_beli" :value="old('harga_beli', $produk->harga_beli)" required autocomplete="harga_beli" />
                                <x-input-error :messages="$errors->get('harga_beli')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="harga_jual" :value="__('Harga Jual')" />
                                <x-text-input id="harga_jual" class="mt-1 block w-full" type="text" name="harga_jual" :value="old('harga_jual', $produk->harga_jual)" required autocomplete="harga_jual" />
                                <x-input-error :messages="$errors->get('harga_jual')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="stok" :value="__('Stok')" />
                                <x-text-input id="stok" class="mt-1 block w-full" type="text" name="stok" :value="old('stok', $produk->stok)" required autofocus autocomplete="stok" />
                                <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                            </div>

                            <div>
                                {{-- <x-input-label for="id_category" :value="__('Kategori')" /> --}}
                                <x-select-categories
                                    name="id_category" 
                                    label="Kategori" 
                                    :selected="old('id_category', $produk->id_category)" 
                                    class="mt-1 block w-full" 
                                />
                                <x-input-error :messages="$errors->get('id_category')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <x-primary-button class="mt-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        new Cleave('#harga_beli', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            prefix: 'Rp ',
            rawValueTrimPrefix: true,
            delimiter: '.'
        });
        new Cleave('#harga_jual', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            prefix: 'Rp ',
            rawValueTrimPrefix: true,
            delimiter: '.'
        });
    </script>
</x-app-layout>

