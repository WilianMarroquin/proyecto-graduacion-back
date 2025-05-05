<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosResidenteTelefonosTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Residente Telefonos',
            'Ver Residente Telefonos',
            'Crear Residente Telefonos',
            'Editar Residente Telefonos',
            'Eliminar Residente Telefonos',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ResidenteTelefono',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
