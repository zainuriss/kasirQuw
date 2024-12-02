<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf 
        <div class="grid grid-cols-2 items-center gap-2">
                <div>
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" class=" mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class=" mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    
                <div>
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <x-text-input id="alamat" class=" mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select
                        name="status" 
                        :options="[ 'kawin' => 'Kawin', 'belum_kawin' => 'Belum Kawin']"
                        class="w-full"
                    /> 
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="nomor_hp" :value="__('Nomor HP')" />
                    <x-text-input id="nomor_hp" class=" mt-1 w-full" type="number" name="nomor_hp" :value="old('nomor_hp')" required autofocus autocomplete="nomor_hp" />
                    <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class=" mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                                    <div class="">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class=" mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    
                                    <!-- Confirm Password -->
                                    <div class="">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        
                                        <x-text-input id="password_confirmation" class=" mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                        
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
        </div>
        <div class="flex items-center justify-end mt-4">

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
