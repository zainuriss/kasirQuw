<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Petugas Page') }}
            </h2>
            <div class="flex flex-row gap-2">
                <a href="{{ route('admin.petugas.create') }}" class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    <x-heroicon-s-plus class="w-5 h-5" />
                    Tambah
                </a>
                <a href="{{ route('admin.petugas.trash') }}" class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-pink-500 to-pink-700 hover:from-pink-600 hover:to-pink-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    <x-heroicon-s-trash class="w-5 h-5" />
                </a>
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
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Usertype</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $petugas as $ptgs )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ptgs->nama }}</td>
                                <td>{{ $ptgs->email }}</td>
                                <td class="capitalize">{{ $ptgs->usertype }}</td>
                                <td>
                                    <a href="{{ route('admin.petugas.show', $ptgs->id) }}" class="bg-green-500 rounded py-1 px-2">Detail</a>
                                    <a href="{{ route('admin.petugas.destroy', $ptgs->id) }}" onclick="return confirmDelete(event)" class="bg-red-500 rounded py-1 px-2">Hapus</a>
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
