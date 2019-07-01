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

}