<?php


namespace app\models\customer;


use yii\db\ActiveRecord;

/**
 * Class CustomerRecord
 * @package app\models\customer
 *
 * @property integer $id
 * @property string $name
 * @property \DateTime $birth_date
 * @property string $notes
 * @property PhoneRecord $phones
 */
class CustomerRecord extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [
                'id',
                'number',
            ],
            [
                'name',
                'required',
            ],
            [
                'name',
                'string',
                'max' => 256,
            ],
            [
                'birth_date',
                'safe' //TODO: Change validation for birth_date, not passing tests.
            ],
            [
                'notes',
                'safe',
            ]
        ];
    }
}