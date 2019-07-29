<?php

namespace app\models\user;

use yii\base\Model;

class LoginForm extends Model
{
    /**
     * @var string username
     */
    public $username;
    /**
     * @var string $password
     */
    public $password;
    /**
     * @var boolean $rememberMe
     */
    public $rememberMe;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [
                [
                    'username',
                    'password',
                ],
                'required',
            ],
            [
                'rememberMe',
                'boolean',
            ],
            [
                'password',
                'validatePassword',
            ],
        ];
    }
}