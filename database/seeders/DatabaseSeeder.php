<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'RizDev',
            'name' => 'Muhammad Bangkit Sanjaya',
            'alamat' => 'Jl. Ikan Kiter Gang Masjid Al-Ikhsan, Kel. Kangkung, Kec. Bumi Waras, Kota Bandar Lampung, Prov. Lampung, Indonesia',
            'jobs' => 'Siswa SMK Negeri 4 Bandar Lampung',
            'phone' => '+62 831-1599-2866',
            'email' => 'bangkitsann28@gmail.com',
            'password' => 'bangkit99',
        ]);
    }
}
