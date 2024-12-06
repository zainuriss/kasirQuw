<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-end">
                <a href="{{ route('admin.petugas.index') }}" 
                   class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
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
                            @foreach ( $petugastrash as $ptgstrash )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ptgstrash->nama }}</td>
                                <td>{{ $ptgstrash->email }}</td>
                                <td class="capitalize">{{ $ptgstrash->usertype }}</td>
                                <td>
                                    <a href="{{ route('admin.petugas.restore', $ptgstrash->id) }}" class="bg-green-500 rounded py-1 px-2">Recycle</a>
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