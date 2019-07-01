<?php
namespace Step\Acceptance;

class CRMServicesManagementSteps extends CRMGuestSteps
{

    function amInListServicesUi()
    {
        $I = $this;
        $I->amOnPage('/services');
    }

    function imagineService()
    {
        $faker = \Faker\Factory::create();
        return [
            'ServiceRecord[name]' => $faker->sentence($words = 3),
            'ServiceRecord[hourly_rate]' => $faker->randomNumber($digits = 2),
        ];
    }

    function fillServiceDataForm($fieldsData)
    {
        $I = $this;
        foreach ($fieldsData as $key => $value)
            $I->fillField($key, $value);
    }

    function submitServiceDataForm()
    {
        $I = $this;
        $I->click('button[type=submit]');
        //$I->wait(1);
    }

}