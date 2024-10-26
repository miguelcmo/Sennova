<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'Correo Electrónico'),
            'password' => Yii::t('app', 'Contraseña'),
            'rememberMe' => Yii::t('app', 'Recordarme'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Logs in a user using the provided username and password in the Admin app.
     *
     * @return bool whether the user is logged in successfully
     */
    public function adminlogin()
    {
        if ($this->validate()) {
            $user = $this->getUser();
    
            // Obtener la instancia de authManager
            $authManager = Yii::$app->authManager;
    
            // Obtener los roles del usuario
            $roles = $authManager->getRolesByUser($user->id);
    
            // Verificar si el usuario tiene un rol bloqueado
            foreach ($roles as $role) {
                if ($role->name === 'subscriber') {
                    Yii::$app->session->setFlash('error', 'Acceso denegado: Su cuenta no tiene permitido ingresar a esta aplicación.');
                    return false; // Bloquear el inicio de sesión
                }
            }
    
            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
    
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            //$this->_user = User::findByUsername($this->username);
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
