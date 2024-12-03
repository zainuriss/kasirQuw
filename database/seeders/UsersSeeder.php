<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'nama' => 'Kang Admin',
                'username' => 'kangadmin',
                'password' => Hash::make('kangadmin'),
                'usertype' => 'admin',
                'alamat' => 'Kota Gotham',
                'nomor_hp' => '08123456789',
                'status' => 'Belum Kawin',
                'email' => 'kangadmin@admin.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kang User',
                'username' => 'kanguser',
                'password' => Hash::make('kanguser'),
                'usertype' => 'petugas',
                'alamat' => 'Kota Gotham',
                'nomor_hp' => '0812345678',
                'status' => 'Belum Kawin',
                'email' => 'kanguser@petugas.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        User::insert($userdata);
    }
}
