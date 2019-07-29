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

    /** @var UserRecord */
    public $user;

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

    /**
     * Get user.
     * @param $username
     * @return UserRecord|null
     */
    private function getUser($username)
    {
        if (!$this->user) {
            $this->user = $this->fetchUser($username);
        }
        return $this->user;
    }

    /**
     * Get all about one user.
     * @param $username
     * @return UserRecord|null
     */
    private function fetchUser($username)
    {
        return UserRecord::findOne(compact('username'));
    }
}