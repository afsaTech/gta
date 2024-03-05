<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            'name' => 'Admin',
            'email' => 'admin@supermesh.com',
            'username' => 'admin',
            'password' => 'admin123',
        ];

        $user = User::firstOrCreate(['email' => 'admin@supermesh.com'], $userData);

        $role = Role::firstOrCreate(['name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
