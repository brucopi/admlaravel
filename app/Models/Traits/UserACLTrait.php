<?php

namespace App\Models\Traits;



trait UserACLTrait
{
    public function permissions(): array
    {
        
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            //if (in_array($permission, $permissionsPlan))
                array_push($permissions, $permission);
        }
        
        return $permissions;
    }

    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }
///nessa função verifica se é admin , ai não depende dos grupos criados
    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    
}