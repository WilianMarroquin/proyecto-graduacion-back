<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosServicioAguasTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Servicio Aguas',
            'Ver Servicio Aguas',
            'Crear Servicio Aguas',
            'Editar Servicio Aguas',
            'Eliminar Servicio Aguas',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ServicioAgua',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
