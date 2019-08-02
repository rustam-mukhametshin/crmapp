<?php

namespace Step\Acceptance;

use Codeception\Exception\ModuleException;

class CRMUsersManagementSteps extends CRMGuestSteps
{
    public $username = 'AnnieManager';
    public $password = 'Shiny 3 things hmm, vulnerable';

    const SERVICES_LIST_SELECTOR = '.grid-view';

    function amInListUsersUi()
    {
        $I = $this;
        $I->amOnPage('/users');
    }

    function clickOnRegisterNewUserButton()
    {
        $I = $this;
        $I->click('Create User Record');
    }

    function seeIAmInAddUserUi()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/users/create');
    }

    function imagineUser()
    {
        $faker = \Faker\Factory::create();
        return [
            'UserRecord[username]' => $faker->userName,
            'UserRecord[password]' => md5(time()),
        ];
    }

    function fillUserDataForm($fieldsData)
    {
        $I = $this;
        foreach ($fieldsData as $key => $value)
            $I->fillField($key, $value);
    }

    function seeUserInList($user_data)
    {
        $I = $this;
        $I->see($user_data['UserRecord[username]'], self::SERVICES_LIST_SELECTOR);
    }

    function submitUserDataForm()
    {
        $I = $this;
        $I->click('button[type=submit]');
        //$I->wait(1);
    }

}