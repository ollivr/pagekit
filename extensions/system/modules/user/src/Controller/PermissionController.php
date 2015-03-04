<?php

namespace Pagekit\User\Controller;

use Pagekit\Application as App;
use Pagekit\User\Entity\Role;

/**
 * @Route("/user/permission")
 * @Access("system: manage user permissions", admin=true)
 */
class PermissionController
{
    /**
     * @Response("extensions/system/modules/user/views/admin/permission.php")
     */
    public function indexAction()
    {
        App::styles('permission-index', 'extensions/system/assets/css/user.css');
        App::scripts('permission-index', 'extensions/system/modules/user/app/role.js', ['vue-system', 'uikit-sticky'])->addData('permission', [
            'data'   => [
                'permissions' => App::permissions(),
                'roles'       => Role::query()->orderBy('priority')->get()
            ]
        ]);

        return ['head.title' => __('Permissions')];
    }
}
