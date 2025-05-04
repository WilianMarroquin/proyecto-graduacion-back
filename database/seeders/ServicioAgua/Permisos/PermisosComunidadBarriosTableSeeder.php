<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosComunidadBarriosTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Comunidad Barrios',
            'Ver Comunidad Barrios',
            'Crear Comunidad Barrios',
            'Editar Comunidad Barrios',
            'Eliminar Comunidad Barrios',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'Comunidad',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
