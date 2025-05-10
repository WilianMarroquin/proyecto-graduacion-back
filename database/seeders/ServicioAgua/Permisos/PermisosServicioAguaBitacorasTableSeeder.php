<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosServicioAguaBitacorasTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Servicio Agua Bitacoras',
            'Ver Servicio Agua Bitacoras',
            'Crear Servicio Agua Bitacoras',
            'Editar Servicio Agua Bitacoras',
            'Eliminar Servicio Agua Bitacoras',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ServicioAguaBitacora',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
