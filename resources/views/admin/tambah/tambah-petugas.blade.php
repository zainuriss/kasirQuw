<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Petugas') }}
            </h2>
            <div class="">
                <x-action-link-button
                    route="{{ route('admin.petugas.index') }}"
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
                    <form method="POST" action="{{ route('admin.petugas.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <x-text-input id="usertype" type="hidden" name="usertype"/>
                            <div>
                                <x-input-label for="nama" :value="__('Nama')" />
                                <x-text-input id="nama" class="mt-1 block w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="username" :value="__('Username')" />
                                <x-text-input id="username" class="mt-1 block w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <x-text-input id="alamat" class="mt-1 block w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="nomor_hp" :value="__('Nomor HP')" />
                                <x-text-input id="nomor_hp" class="mt-1 block w-full" type="text" name="nomor_hp" :value="old('nomor_hp')" required autofocus autocomplete="nomor_hp" />
                                <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="status" :value="__('Status')" class="mb-1"/>
                                <select id="status" name="status" class="select2 mt-1 block w-full" required>
                                    <option value="" disabled hidden selected>Pilih Status</option>
                                    <option value="belum_kawin">Belum Kawin</option>
                                    <option value="kawin">Kawin</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
</x-app-layout>

