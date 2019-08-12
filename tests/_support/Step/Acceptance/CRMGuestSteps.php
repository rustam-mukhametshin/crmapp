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

    public function seeIAmInLoginFormUi()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/site/login');
    }

    public function fillLoginForm($user)
    {
        $I = $this;
        $I->fillField('LoginForm[username]', $user['UserRecord[username]']);
        $I->fillField('LoginForm[password]', $user['UserRecord[password]']);
    }

    public function submitLoginForm()
    {
        $I = $this;
        $I->click('button[type=submit]');
        //$I->wait(1);
    }

    public function seeIAmAtHomepage()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/');
    }
}