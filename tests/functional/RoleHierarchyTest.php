<?php

use app\models\user\UserRecord;
use yii\web\User;

class RoleHierarchyTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;
    /** @var User */
    private $user;

    protected function _before()
    {
        $this->user = Yii::$app->user;
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    public function DefaultRoleIsGuest()
    {
        // no login at all
        $this->assertFalse($this->user->can('admin'));
        $this->assertFalse($this->user->can('manager'));
        $this->assertFalse($this->user->can('user'));
        $this->assertTrue($this->user->can('guest'));
    }

    public function PredefinedUserRoles()
    {
        return [
            [
                'RobAdmin',
                [
                    'admin' => true,
                    'manager' => true,
                    'user' => true,
                    'guest' => true,
                ],
            ],
            [
                'AnnieManager',
                [
                    'admin' => false,
                    'manager' => true,
                    'user' => true,
                    'guest' => true,
                ],
            ],
            [
                'JoeUser',
                [
                    'admin' => false,
                    'manager' => false,
                    'user' => true,
                    'guest' => true,
                ],
            ],
        ];
    }

    /**
     * @test
     * @dataProvider PredefinedUserRoles
     * @param $username
     * @param $rbac
     */
    public function PredefinedUsersHasProperRoles($username, $rbac)
    {
        $identity = UserRecord::findOne(compact('username'));

        $this->user->login($identity);

        foreach ($rbac as $role => $allowed) {
            $this->assertEquals($allowed, $this->user->can($role));
        }
    }
}