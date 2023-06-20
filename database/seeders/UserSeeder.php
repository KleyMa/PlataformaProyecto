<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::create([
            'usuario' => 'mashiro',
            'email' => 'poco0o083@gmail.com',
            'password' => bcrypt('mashiro1000'),
        ]);

        $role = Role::where('name', 'Admin')->first();
        $usuario->assignRole($role);
    }
}
