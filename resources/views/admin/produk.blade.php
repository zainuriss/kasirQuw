<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Produk Page') }}
            </h2>
            <div class="flex flex-row gap-2">
                <x-action-link-button
                    route="{{ route('admin.produk.create') }}"
                    icon="heroicon-s-plus"
                    text="Tambah"
                />
                <x-action-link-button
                    route="{{ route('admin.produk.trash') }}"
                    icon="gmdi-restore-from-trash-s"
                    gradient="from-pink-500 to-pink-700 hover:from-pink-600 hover:to-pink-800"
                />
                @include('admin.import.import-produk')
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="myTable row-border">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Produk</td>
                                <td>Kategori</td>
                                <td>Barcode</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $produk as $prdk )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prdk->nama_produk }}</td>
                                <td>{{ $prdk->kategori->nama_kategori }}</td>
                                <td>{{ $prdk->barcode }}</td>
                                <td class="inline-flex gap-2">
                                    <x-action-link-button
                                    route="{{ route('admin.produk.show', $prdk->id) }}"
                                    text="Detail"
                                    gradient="from-green-500 to-green-700 hover:from-green-600 hover:to-green-800"
                                    padding="py-1 px-2"
                                    />
                                <x-action-link-button
                                    route="{{ route('admin.produk.destroy', $prdk->id) }}"
                                    text="Hapus"
                                    gradient="from-red-500 to-red-700 hover:from-red-600 hover:to-red-800"
                                    padding="py-1 px-2"
                                />
                                    {{-- <a href="{{ route('admin.petugas.show', $ptgs->id) }}" class="bg-green-500 rounded py-1 px-2">Detail</a>
                                    <a href="{{ route('admin.petugas.destroy', $ptgs->id) }}" onclick="return confirmDelete(event)" class="bg-red-500 rounded py-1 px-2">Hapus</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
