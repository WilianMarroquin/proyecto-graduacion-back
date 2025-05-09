<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosServicioAguaEstadosTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Servicio Agua Estados',
            'Ver Servicio Agua Estados',
            'Crear Servicio Agua Estados',
            'Editar Servicio Agua Estados',
            'Eliminar Servicio Agua Estados',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ServicioAguaEstado',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
