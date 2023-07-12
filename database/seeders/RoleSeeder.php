<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleIngeniero = Role::create(['name' => 'Ingeniero']);
        $roleVisitante = Role::create(['name' => 'Visitante']);

        Permission::create(['name' => 'inventario', 'description' => 'Ver apartado de inventario'])->syncRoles([$roleAdmin, $roleIngeniero, $roleVisitante]);
        Permission::create(['name' => 'inventarioVer', 'description' => 'Ver informacion de equipos'])->syncRoles([$roleAdmin, $roleIngeniero, $roleVisitante]);
        Permission::create(['name' => 'inventarioAgregarEquipo', 'description' => 'Agregar nuevos equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioEditarEquipo', 'description' => 'Editar equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioDarBaja', 'description' => 'Dar de baja a los equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioDarAlta', 'description' => 'Dar de alta a los equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioInactivos', 'description' => 'Ver equipos inactivos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioEliminarEquipo', 'description' => 'Eliminar equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'bitacoras', 'description' => 'Ver apartado de bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasVer', 'description' => 'Ver informacion de bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasAgregarBitacora', 'description' => 'Agregar nuevas bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasEditarBitacora', 'description' => 'Editar bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasEliminarBitacora', 'description' => 'Eliminar bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasVerBitacoraFisica', 'description' => 'Ver bitacoras fisicas'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasEliminarBitacoraFisica', 'description' => 'Eliminar bitacoras fisicas'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'imagenes', 'description' => 'Ver apartado de imagenes'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'imagenesAgregar', 'description' => 'Agregar nuevas imagenes'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'imagenesEditar', 'description' => 'Editar imagenes'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'imagenesEliminar', 'description' => 'Eliminar imagenes'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'manuales', 'description' => 'Ver apartado de manuales'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'manualesVer', 'description' => 'Ver manuales adjuntos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'manualesEditar', 'description' => 'Editar manuales'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'manualesEliminar', 'description' => 'Eliminar manuales'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'QRs', 'description' => 'Ver apartado de QRs'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'verQRs', 'description' => 'Ver QRs'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'QRsEditar', 'description' => 'Editar QRs'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'QRsEliminar', 'description' => 'Eliminar QRs'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'RegistrarUsuario', 'description' => 'Registrar usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuarios', 'description' => 'Ver usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuariosVer', 'description' => 'Ver informacion de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuariosEditar', 'description' => 'Editar informacion de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuariosEliminar', 'description' => 'Eliminar usuarios'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'roles', 'description' => 'Ver apartado de roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'AgregarRol', 'description' => 'Agregar nuevos roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'rolesVer', 'description' => 'Ver informacion de roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'rolesEditar', 'description' => 'Editar informacion de roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'rolesEliminar', 'description' => 'Eliminar roles'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'estadisticas', 'description' => 'Ver apartado de estadisticas'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'verLogs', 'description' => 'Ver apartado de logs'])->syncRoles([$roleAdmin, $roleIngeniero]);

        //Un uso
        //$role->givePermissionTo($permission);
        //$permission->assignRole($role);

        //Multiples agregados
        //$role->syncPermissions($permissions);
        //$permission->syncRoles($roles);

        //Quitar permisos
        //$role->revokePermissionTo($permission);
        //$permission->removeRole($role);
    }
}
