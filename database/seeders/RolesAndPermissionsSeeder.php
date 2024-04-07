<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // 清理缓存
        app()['cache']->forget('spatie.permission.cache');

        // 权限列表
        $permissions = [
            'manage students' => ['管理员'],
            'edit own profile' => ['学生']
        ];

        // 分配权限
        foreach ($permissions as $permission => $roles) {
            $perm = Permission::findOrCreate($permission, 'web');
            foreach ($roles as $role) {
                $roleInstance = Role::findOrCreate($role, 'web');
                $roleInstance->givePermissionTo($perm);
            }
        }
    }
}
