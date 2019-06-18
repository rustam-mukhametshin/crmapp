<?php


namespace app\models\customer;


use yii\db\ActiveRecord;

/**
 * Class PhoneRecord
 * @package app\models\customer
 *
 * @property integer $customer_id
 * @property string $number
 */
class PhoneRecord extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%phone}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [
                'customer_id',
                'number',
            ],
            [
                'number',
                'string',
            ],
            [
                [
                    'customer_id',
                    'number',
                ],
                'required',
            ],
        ];
    }
}