<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\RolUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ------------ USUARIOS
        $user = new User();
        $user->name = 'Igor Desarrollo';
        $user->email = 'isobayev@gmail.com';
        $user->password = bcrypt('ginettag50');
        $user->status = true;
        $user->id_currency = 1;
        $user->save();

        $user = new User();
        $user->name = 'Estandar User';
        $user->email = 'isobayev.estandar@gmail.com';
        $user->password = bcrypt('ginettag50');
        $user->status = true;
        $user->id_currency = 1;
        $user->save();

        $user = new User();
        $user->name = 'VIP User';
        $user->email = 'isobayev.vip@gmail.com';
        $user->password = bcrypt('ginettag50');
        $user->status = true;
        $user->id_currency = 1;
        $user->save();

        // ------------- ROLES
        $rol = new Rol();
        $rol->name = 'Admin';
        $rol->descr = 'Usuario administrador de la aplicación';
        $rol->literal_descr = 'descr_admin';
        $rol->status = true;
        $rol->save();

        $rol = new Rol();
        $rol->name = 'Normal';
        $rol->descr = 'Usuario corriente de la aplicación';
        $rol->literal_descr = 'descr_normal';
        $rol->status = true;
        $rol->save();

        $rol = new Rol();
        $rol->name = 'VIP';
        $rol->descr = 'Usuario VIP de la aplicación';
        $rol->literal_descr = 'descr_vip';
        $rol->status = true;
        $rol->save();

        // ------------------ ROLES USUARIOS
        $userrol = new RolUser();
        $id_rol = 1;
        $id_user = 1;
        $userrol->save();

        $userrol = new RolUser();
        $id_rol = 2;
        $id_user = 2;
        $userrol->save();

        $userrol = new RolUser();
        $id_rol = 3;
        $id_user = 3;
        $userrol->save();
    }
}
