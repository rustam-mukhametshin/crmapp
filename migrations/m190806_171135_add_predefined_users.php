<?php

use app\models\user\UserRecord;
use yii\db\Migration;

/**
 * Class m190806_171135_add_predefined_users
 */
class m190806_171135_add_predefined_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach (
            [
                'JoeUser' => '7 wonder @ American soil',
                'AnnieManager' => 'Shiny 3 things hmm, vulnerable',
                'RobAdmin' => 'Imitate #14th symptom of apathy'
            ] as $username => $password
        ) {
            $user = new UserRecord();
            $user->attributes = compact('username', 'password');
            $user->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
