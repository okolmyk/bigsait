<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
use app\models\Users;
use \app\rbac\UserProfileOwnerRule;


class RbacController extends Controller
{

    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
		$authManager->removeAll();

        // Create roles
        $user = $authManager->createRole('user');
        $admin  = $authManager->createRole('admin');

        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $index  = $authManager->createPermission('index');
        $view   = $authManager->createPermission('view');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');
        $create = $authManager->createPermission('create');

        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);
        $authManager->add($create);

        // Add roles in Yii::$app->authManager
        $authManager->add($user);
        $authManager->add($admin);

        // Add permission-per-role in Yii::$app->authManager
        // user
        $authManager->addChild($user, $login);
        $authManager->addChild($user, $logout);
        $authManager->addChild($user, $error);
        $authManager->addChild($user, $signUp);
        $authManager->addChild($user, $index);
        $authManager->addChild($user, $view);

        // Admin
        $authManager->addChild($admin, $create);
        $authManager->addChild($user, $update);
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $user);

        //навесить роль на id юзера
        $authManager->assign($admin, 1);
        $authManager->assign($admin, 3);
        $authManager->assign($user, 2);
    }


}
