<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\customer\Customer;
use app\models\customer\CustomerRecord;
use app\models\customer\Phone;
use app\models\customer\PhoneRecord;

/**
 * Class CustomersController
 * @package app\controllers
 */
class CustomersController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $records = $this->findRecordsByQuery();
        return $this->render('index', compact('records'));
    }

    /**
     * @return string
     */
    public function actionAdd()
    {
        $customer = new CustomerRecord();
        $phone = new PhoneRecord();
        return $this->render('add', compact('customer', 'phone'));
    }

    /**
     * @param Customer $customer
     */
    private function store(Customer $customer)
    {
        $customer_record = new CustomerRecord();
        $customer_record->name = $customer->name;
        $customer_record->birth_date = $customer->birth_date->format('Y-m-d');
        $customer_record->notes = $customer->notes;

        $customer_record->save();

        foreach ($customer->phones as $phone) {
            /** @var Phone $phone */

            $phone_record = new PhoneRecord();
            $phone_record->number = $phone->number;
            $phone_record->customer_id = $customer_record->id;

            $phone_record->save();
        }
    }

    /**
     * @param CustomerRecord $customerRecord
     * @param PhoneRecord $phoneRecord
     * @return Customer
     * @throws \Exception
     */
    private function makeCustomer(CustomerRecord $customerRecord, PhoneRecord $phoneRecord)
    {
        $name = $customerRecord->name;
        $birth_date = new \DateTime($customerRecord->birth_date);

        $customer = new Customer($name, $birth_date);
        $customer->notes = $customerRecord->notes;
        $customer->phones[] = new Phone($phoneRecord->number);

        return $customer;
    }

    /**
     * @param CustomerRecord $customerRecord
     * @param PhoneRecord $phoneRecord
     * @param array $post
     * @return bool
     */
    private function load(CustomerRecord $customerRecord, PhoneRecord $phoneRecord, array $post)
    {
        return $customerRecord->load($post)
            and $phoneRecord->load($post)
            and $customerRecord->validate()
            and $phoneRecord->validate(['number']);
    }

}