<?php

use app\models\user\UserRecord;
use Faker\Factory;
use yii\base\Security;
use Codeception\Test\Unit;

class PasswordHashingTest extends Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function PasswordIsHashedWhenSavingUser()
    {
        $user = $this->imagineUserRecord();
        $plaintext_password = $user->password;
        $user->save();

        $saved_user = UserRecord::findOne($user->id);

        $security = new Security();
        $this->assertInstanceOf(get_class($user), $saved_user);
        $this->assertTrue(
            $security->validatePassword(
                $plaintext_password,
                $saved_user->password
            )
        );
    }

    public function imagineUserRecord()
    {
        $faker = Factory::create();

        $user = new UserRecord();
        $user->username = $faker->word;
        $user->password = md5(time());
        return $user;
    }

    public function PasswordIsNotRehashedAfterUpdatingWithoutChangingPassword()
    {
        $user = $this->imagineUserRecord();
        $user->save();

        /** @var UserRecord $saved_user */
        $saved_user = UserRecord::findOne($user->id);
        $expected_hash = $saved_user->password;

        $saved_user->username = md5(time());
        $saved_user->save();

        /** @var UserRecord $updated_user */
        $updated_user = UserRecord::findOne($saved_user->id);

        $this->assertEquals($expected_hash, $saved_user->password);
        $this->assertEquals($expected_hash, $updated_user->password);
    }

}