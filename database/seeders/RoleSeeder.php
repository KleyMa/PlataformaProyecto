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

        Permission::create(['name' => 'inventario', 'description' => 'Ver inventario'])->syncRoles([$roleAdmin, $roleIngeniero, $roleVisitante]);
        Permission::create(['name' => 'inventarioVer', 'description' => 'Ver informacion de equipos'])->syncRoles([$roleAdmin, $roleIngeniero, $roleVisitante]);
        Permission::create(['name' => 'inventarioAgregarEquipo', 'description' => 'Agregar nuevos equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioEditarEquipo', 'description' => 'Editar equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'inventarioEliminarEquipo', 'description' => 'Eliminar equipos'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'bitacoras', 'description' => 'Ver bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasVer', 'description' => 'Ver informacion de bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasAgregarBitacora', 'description' => 'Agregar nuevas bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasEditarBitacora', 'description' => 'Editar bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);
        Permission::create(['name' => 'bitacorasEliminarBitacora', 'description' => 'Eliminar bitacoras'])->syncRoles([$roleAdmin, $roleIngeniero]);

        Permission::create(['name' => 'RegistrarUsuario', 'description' => 'Registrar usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuarios', 'description' => 'Ver usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuariosVer', 'description' => 'Ver informacion de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuariosEditar', 'description' => 'Editar informacion de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'usuariosEliminar', 'description' => 'Eliminar usuarios'])->syncRoles([$roleAdmin]);

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
