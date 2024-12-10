<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-end">
                <x-action-link-button
                    route="{{ route('admin.produk.index') }}"
                    icon="heroicon-o-arrow-long-left"
                    text="Kembali"
                    gradient="from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800"
                />
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="myTable row-border">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Produk</td>
                                <td>Nama Kategori</td>
                                <td>Barcode</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $produktrash as $prdktrash )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prdktrash->nama_produk }}</td>
                                <td>{{ $prdktrash->kategori->nama_kategori }}</td>
                                <td>{{ $prdktrash->barcode }}</td>
                                <td>
                                    <a href="{{ route('admin.produk.restore', $prdktrash->id) }}" class="bg-green-500 rounded py-1 px-2">Recycle</a>
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