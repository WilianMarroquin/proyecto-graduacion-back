<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Direcciones\ComunidadBarrioDireccion;
use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosComunidadBarrioDireccionesTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Comunidad Barrio Direcciones',
            'Ver Comunidad Barrio Direcciones',
            'Crear Comunidad Barrio Direcciones',
            'Editar Comunidad Barrio Direcciones',
            'Eliminar Comunidad Barrio Direcciones',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ComunidadBarrioDireccion',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
