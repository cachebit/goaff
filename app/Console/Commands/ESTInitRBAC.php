<?php namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App;
use Illuminate\Database\Eloquent\Collection;

class ESTInitRBAC extends BaseCommand
{
    // Entrust is an RBAC library... RBAC = "Role Based Access Control"
    protected $signature = 'est:init-rbac';

    protected $description = 'Initialize Role Based Access Control';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = User::first();
        if (!$user) {
            $this->error("Users table is empty");
            return;
        }
        $founder     = Role::addRole('Founder', '站长');
        $maintainer  = Role::addRole('Maintainer', '管理');
        $platinum = Role::addRole('Platinum', '白金会员');//更加优质的会员
        $golden = Role::addRole('Golden', '黄金会员');//年费用户
        $premium = Role::addRole('Premium', '高级会员');//月费用户
        $register = Role::addRole('Register', '注册会员');//注册用户

        $visit_admin   = Permission::addPermission('visit_admin', '网站管理权限');
        $manage_users  = Permission::addPermission('manage_users', '用户管理权限');
        $manage_topics = Permission::addPermission('manage_topics', '文章管理权限');
        $compose_announcement = Permission::addPermission('compose_announcement', '公告发布权限');
        $monthly_accessable = Permission::addPermission('monthly_accessable', '过去30天和今后30天');
        $annually_accessable = Permission::addPermission('annually_accessable', '过去全部和今后1年');

        $this->attachPermissions($founder, [
            $visit_admin,
            $manage_users,
            $manage_topics,
            $compose_announcement,
        ]);

        $this->attachPermissions($maintainer, [
            $visit_admin,
            $manage_topics,
            $compose_announcement,
        ]);

        if (!$user->hasRole($founder->name)) {
            $user->attachRole($founder);
        }

        $this->info('--');
        $this->info("Initialize RABC success -- ID: 1 and Name “{$user->name}” has founder permission");
        $this->info('--');
    }

    /**
     * @param Role         $role
     * @param Permission[] $permissions
     */
    public function attachPermissions(Role $role, array $permissions)
    {
        $attach = [];

        $permissions = new Collection($permissions);

        $detach = [];
        foreach ($role->perms()->get() as $permission) {
            if ($permissions->where('name', $permission->name)->isEmpty()) {
                $detach[] = $permission;
            }
        }

        foreach ($permissions as $permission) {
            if (!$role->hasPermission($permission->name)) {
                $attach[] = $permission;
            }
        }

        $role->detachPermissions($detach);
        $role->attachPermissions($attach);
    }
}
