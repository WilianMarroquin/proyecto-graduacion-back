<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Direcciones\ComunidadBarrioDireccion;
use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosResidentesTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Ver Catalogos Residentes',
            'Listar Residentes',
            'Ver Residentes',
            'Crear Residentes',
            'Editar Residentes',
            'Eliminar Residentes',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'Residente',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
