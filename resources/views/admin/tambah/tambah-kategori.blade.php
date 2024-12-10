<div
    id="modalTambahKategori"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50"
>
    <div class="bg-white dark:bg-gray-800 w-full max-w-lg p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
            Tambah Kategori
        </h2>
        <form method="POST" action="{{ route('admin.kategori.store') }}">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <x-input-label for="nama_kategori" :value="__('Nama Kategori')" />
                    <x-text-input id="nama_kategori" class="mt-1 block w-full" type="text" name="nama_kategori" :value="old('nama_kategori')" required autofocus autocomplete="nama_kategori" />
                    <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
                </div>
            </div>
            <div class="flex justify-end mt-4 gap-2">
                <button
                    type="button"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold text-xs uppercase tracking-widest py-2 px-4 rounded-md transition ease-in-out duration-150"
                    onclick="toggleModal('modalTambahKategori')"
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