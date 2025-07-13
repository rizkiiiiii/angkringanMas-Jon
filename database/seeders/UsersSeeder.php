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

        User::create([
            'nama'     => 'Owner',
            'email'    => 'Masjon@gmail.com',
            'password' => bcrypt('Masjon123'),
            'role_id'  => 1,
        ]);
        User::create([
            'nama'     => 'Kasir',
            'email'    => 'Kasir@gmail.com',
            'password' => bcrypt('Kasir123'),
            'role_id'  => 2,
        ]);

    }
}
