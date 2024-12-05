<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Petugas Page') }}
            </h2>
            <div class="flex flex-row gap-2">
                <a href="{{ route('admin.inpetugas') }}" class="rounded bg-blue-600 text-white p-2 text-sm">Tambah</a>
                <a href="{{ route('admin.dashboard') }}" ><x-heroicon-s-trash class="rounded bg-pink-600 text-white p-2 w-10"/></a>
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
                        @php
                            $i = 1;
                        @endphp
                        <tbody>
                            @foreach ( $petugas as $ptgs )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $ptgs->nama }}</td>
                                <td>{{ $ptgs->email }}</td>
                                <td class="capitalize">{{ $ptgs->usertype }}</td>
                                <td>
                                    <a href="{{ route('admin.detailpetugas', $ptgs->id) }}" class="bg-green-500 rounded py-1 px-2">Detail</a>
                                    <a href="{{ route('admin.deletepetugas', $ptgs->id) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"" class="bg-red-500 rounded py-1 px-2">Hapus</a>
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
