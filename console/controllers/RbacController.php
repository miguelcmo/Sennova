<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Eliminar todos los datos anteriores de RBAC
        $auth->removeAll();
        
        // Crear roles
        $superAdmin = $auth->createRole('superadmin');
        $superAdmin->description = 'Has access to all system features';
        $auth->add($superAdmin);

        $admin = $auth->createRole('admin');
        $admin->description = 'Can manage system settings and users';
        $auth->add($admin);

        $instructor = $auth->createRole('instructor');
        $instructor->description = 'Responsible for delivering training and courses';
        $auth->add($instructor);

        $apprentice = $auth->createRole('apprentice');
        $apprentice->description = 'Learner with access to training materials';
        $auth->add($apprentice);

        $subscriber = $auth->createRole('subscriber');
        $subscriber->description = 'Basic access to the platform, with limited features';
        $auth->add($subscriber);

        // Asignar roles a usuarios
        $auth->assign($superAdmin, 1);
        $auth->assign($admin, 10);           
        $auth->assign($instructor, 11);
        $auth->assign($apprentice, 12);
        $auth->assign($subscriber, 13);
    }
}