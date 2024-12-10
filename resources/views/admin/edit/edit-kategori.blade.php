<button
                                    class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg"
                                    onclick="toggleModal('modalEditKategori')"
                                >Edit</button>
                                
<div
    id="modalEditKategori"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50"
>
    <div class="bg-white dark:bg-gray-800 w-full max-w-lg p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
            Edit Kategori
        </h2>
        <form id="edit-kategori-form" method="POST" action="{{ route('admin.kategori.update', $ktgr->id) }}">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <x-input-label for="nama_kategori" :value="__('Nama Kategori')" />
                    <x-text-input id="nama_kategori" class="mt-1 block w-full" type="text" name="nama_kategori" :value="old('nama_kategori', $ktgr->nama_kategori)" required autofocus autocomplete="nama_kategori" />
                    <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
                </div>
            </div>
            <div class="flex justify-end mt-4 gap-2">
                <button
                    type="button"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold text-xs uppercase tracking-widest py-2 px-4 rounded-md transition ease-in-out duration-150"
                    onclick="toggleModal('modalEditKategori')"
                >
                    Batal
                </button>
                <x-primary-button>
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
    <script>
        function confirmEditKategori() {
            Swal.fire({
                title: 'Apakah anda yakin ingin mengedit data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Gaskann!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('edit-kategori-form').submit();
                }
            });
            return false;
        }
    </script>
