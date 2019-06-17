<?php

namespace app\models\customer;

/**
 * Class Customer
 * @package app\models\customer
 */
class Customer
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var \DateTime
     */
    public $birth_date;
    /**
     * @var string
     */
    public $notes = '';
    /**
     * @var array
     */
    public $phones = [];

    /**
     * Customer constructor.
     * @param $name
     * @param $birth_date
     */
    public function __construct($name, $birth_date)
    {
        $this->name = $name;
        $this->birth_date = $birth_date;
    }
}