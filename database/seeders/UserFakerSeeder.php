<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        for($i = 0; $i < 15; $i++){
            $data = [
                'nama' => $nama = $faker->name(),
                'username' => strtolower(str_replace(' ', '.', $nama)),
                'password' => Hash::make('password'),
                'usertype' => 'petugas',
                'alamat' => $faker->address(),
                'nomor_hp' => $faker->phoneNumber(),
                'status' => $faker->randomElement(['Belum Kawin', 'Kawin']),
                'email' => strtolower(str_replace(' ', '.', $nama)).'@petugas.com',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            User::create($data);
        }
    }
}
