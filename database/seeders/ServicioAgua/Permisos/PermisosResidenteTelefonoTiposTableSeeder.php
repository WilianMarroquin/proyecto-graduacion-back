<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosResidenteTelefonoTiposTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Residente Telefono Tipos',
            'Ver Residente Telefono Tipos',
            'Crear Residente Telefono Tipos',
            'Editar Residente Telefono Tipos',
            'Eliminar Residente Telefono Tipos',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ResidenteTelefonoTipo',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
