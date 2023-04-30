<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $adminRole = Role::create(['name' => 'superadmin']);
        $invitadoRole = Role::create(['name' => 'user']);

        Permission::create(['name' => 'view:role']);
        Permission::create(['name' => 'create:role']);
        Permission::create(['name' => 'edit:role']);
        Permission::create(['name' => 'delete:role']);

        Permission::create(['name' => 'view:permissions']);

        Permission::create(['name' => 'view:user']);
        Permission::create(['name' => 'create:user']);
        Permission::create(['name' => 'edit:user']);
        Permission::create(['name' => 'delete:user']);

        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($adminRole);

        $user = new User;
        $user->name = 'Guest';
        $user->email = 'invitado@mail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($invitadoRole);

    }

}