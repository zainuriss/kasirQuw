<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kategori Page') }}
            </h2>
            <div class="flex flex-row gap-2">
                <button
                    class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg"
                    onclick="toggleModal('modalTambahKategori')"
                >
                <x-heroicon-s-plus class="w-5 h-5"/>Tambah
                </button>
                <x-action-link-button
                    route="{{ route('admin.kategori.trash') }}"
                    icon="gmdi-restore-from-trash-s"
                    gradient="from-pink-500 to-pink-700 hover:from-pink-600 hover:to-pink-800"
                />
            </div>
        </div>
    </x-slot>

    @include('admin.tambah.tambah-kategori')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="myTables row-border">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Kategori</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $kategori as $ktgr )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ktgr->nama_kategori }}</td>
                                <td class="inline-flex gap-2">
                                    @include('admin.edit.edit-kategori')
                                <x-action-link-button
                                    route="{{ route('admin.kategori.destroy', $ktgr->id) }}"
                                    text="Hapus"
                                    gradient="from-red-500 to-red-700 hover:from-red-600 hover:to-red-800"
                                    padding="py-1 px-2"
                                />
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
