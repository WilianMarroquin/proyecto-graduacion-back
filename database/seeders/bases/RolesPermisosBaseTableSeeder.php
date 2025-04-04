<?php

namespace Database\Seeders\bases;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosBaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Role::truncate();
        Permission::truncate();

        // Definir roles
        $roles = [
            'Super Admin',
            'Administrador',
            'Empleado',
            'Programador',
        ];

        // Crear roles
        $rolesInstances = [];
        foreach ($roles as $role) {
            $rolesInstances[$role] = Role::create(['name' => $role, 'guard_name' => 'web']);
        }

        // Definir permisos
        $permisos = [
            'Menu Opcion' => ['Listar', 'Ver', 'Crear', 'Editar', 'Eliminar'],
            'User' => ['Ver modulo', 'Listar', 'Ver', 'Crear', 'Editar', 'Eliminar'],
            'Permission' => ['Listar', 'Ver', 'Crear', 'Editar', 'Eliminar'],
            'Rol' => ['Listar', 'Ver', 'Crear', 'Editar', 'Eliminar'],
        ];

        // Crear permisos y asignarlos a los roles correspondientes
        foreach ($permisos as $subject => $acciones) {
            foreach ($acciones as $accion) {
                $permiso = Permission::create([
                    'name' => "$accion $subject",
                    'subject' => $subject,
                    'guard_name' => 'web',
                ]);

                // Asignar permisos al 'Super Admin'
                $rolesInstances['Super Admin']->givePermissionTo($permiso);

                // Asignar permisos al 'Administrador' según tipo de acción
                if (in_array($accion, ['Listar', 'Ver', 'Crear', 'Editar', 'Eliminar'])) {
                    $rolesInstances['Administrador']->givePermissionTo($permiso);
                }

                // Asignar permisos al 'Programador'
                if (in_array($accion, ['Listar', 'Ver'])) {
                    $rolesInstances['Programador']->givePermissionTo($permiso);
                }

                // Asignar permisos al 'Empleado' solo si son específicos para él
                if (in_array($accion, ['Listar', 'Ver'])) {
                    $rolesInstances['Empleado']->givePermissionTo($permiso);
                }
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
