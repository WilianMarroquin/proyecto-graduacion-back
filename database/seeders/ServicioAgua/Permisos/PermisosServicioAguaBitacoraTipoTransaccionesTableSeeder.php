<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosServicioAguaBitacoraTipoTransaccionesTableSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'Listar Servicio Agua Bitacora Tipo Transacciones',
            'Ver Servicio Agua Bitacora Tipo Transacciones',
            'Crear Servicio Agua Bitacora Tipo Transacciones',
            'Editar Servicio Agua Bitacora Tipo Transacciones',
            'Eliminar Servicio Agua Bitacora Tipo Transacciones',
        ];

        $permisosCreados = [];

        foreach ($permisos as $permiso) {
            $permisoCreado = Permission::firstOrCreate([
                'name' => $permiso,
                'subject' => 'ServicioAguaBitacoraTipoTransaccion',
                'guard_name' => 'web',
            ]);
            $permisosCreados[] = $permisoCreado;
        }

        $superAdmin = Role::find(Rol::ADMINISTRADOR);

        $superAdmin->givePermissionTo($permisosCreados);
    }
}
