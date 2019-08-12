<?php
namespace Step\Acceptance;

class CRMGuestSteps extends \AcceptanceTester
{

    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', $username);
        $I->fillField('LoginForm[password]', $password);
        $I->click('Login');
        //$I->wait(1);
        $I->seeCurrentUrlEquals('/');
    }

    function logout()
    {
        $I = $this;
        $I->amOnPage('/');
        // Expecting that this button is presented on the homepage.
        $I->click('logout');
    }
}