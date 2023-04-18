<?php

namespace app\models;

use yii;


class SignupForm extends yii\base\Model
{
    public $username;
    public $email;
    public $password;


    public function rules() {
        return [
            [['username', 'email', 'password'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::class,  'message' => 'Этот логин уже занят'],
        ];

    }


    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

}

