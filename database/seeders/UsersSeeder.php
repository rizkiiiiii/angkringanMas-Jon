<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'nama' => 'pelayan',
        ]);
        Role::create([
            'nama' => 'Kasir',
        ]);
        Role::create([
            'nama' => 'owner',
        ]);
        Role::create([
            'nama' => 'pelanggan',
        ]);

        User::create([
            'nama'     => 'Owner',
            'email'    => 'Masjon@gmail.com',
            'password' => bcrypt('Masjon123'),
            'role_id'  => 3,
        ]);
        User::create([
            'nama'     => 'Kasir',
            'email'    => 'Kasir@gmail.com',
            'password' => bcrypt('Kasir123'),
            'role_id'  => 2,
        ]);
        User::create([
            'nama'     => 'pelayan',
            'email'    => 'Pelayan@gmail.com',
            'password' => bcrypt('Pelayan'),
            'role_id'  => 1,
        ]);

    }
}
