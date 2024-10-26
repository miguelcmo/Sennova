<?php

namespace appServiser\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            //['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de usuario ya ha sido utilizado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Esta dirección de correo electrónico ya ha sido utilizada.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user) && $this->assignRole($user);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Nombre de Usuario'),
            'email' => Yii::t('app', 'Correo Electrónico'),
            'password' => Yii::t('app', 'Contraseña'),
        ];
    }

    /**
     * Asign new created user to the Subscriber role by default
     * @param User $user user model to with role should be assigned
     * @return bool wheter the role is assigned
     */
    protected function assignRole($user) 
    {
        $auth = Yii::$app->authManager;

        $subscriber = $auth->getRole('subscriber');

        if($auth->assign($subscriber, $user->id)) {
            return true;
        }

        return false;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['serviserEmail'] => 'Administrador ' . Yii::$app->name]) // this is the sender email configured in params file as serviserEmail
            ->setTo($user->email)
            ->setSubject('Cuenta registrada en ' . Yii::$app->name)
            ->send();
    }
}
