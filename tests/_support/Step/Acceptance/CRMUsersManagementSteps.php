<?php

namespace Step\Acceptance;

use Codeception\Exception\ModuleException;

class CRMUsersManagementSteps extends CRMGuestSteps
{
    public $username = 'RobAdmin';
    public $password = 'Imitate #14th symptom of apathy';

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

    public function seeIAmInListUsersUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('/users/'); // this is regexp , not an URL
        $I->seeElement(self::SERVICES_LIST_SELECTOR);
    }

    public function seeIamInViewUserUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('~users/view~'); // this is regexp, not an URL
        $I->see('Update');
        $I->see('Delete');
    }

    public function seeEditUserUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('~users/update~'); // this is regexp, not an URL
        $I->see('Update');
    }

    public function dontSeeUserInList($user_data)
    {
        $I = $this;
        $I->dontSee($user_data['UserRecord[username]'],
            self::SERVICES_LIST_SELECTOR
        );
    }

    public function seeEditButtonBesideUser($user_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearUserName(
            $user_data['UserRecord[username]'],
            'Update'
        );
        $I->seeElement($xpath);
    }

    private function makeXpathForButtonNearUserName(
        $user_name,
        $button_title
    )
    {
        $xpath = sprintf(
            '//td[text()="%s"]/following-sibling::td/a[@title="%s"]',
            $user_name,
            $button_title
        );
        return $xpath;
    }

    public function clickEditButtonBesideUser($user_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearUserName(
            $user_data['UserRecord[username]'],
            'Update'
        );
        $I->click($xpath);
    }

    public function seeDeletionConfirmation()
    {
        $I = $this;
        $I->seeInPopup('delete');
    }

    public function cancelDeletion()
    {
        $I = $this;
        //$I->cancelPopup();
    }

    public function confirmDeletion()
    {
        $I = $this;
        //$I->acceptPopup();
    }

    public function seeDeleteButtonBesideUser($user_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearUserName(
            $user_data['UserRecord[username]'],
            'Delete'
        );
        $I->seeElement($xpath);
    }

    public function clickDeleteButtonBesideUser($user_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearUserName(
            $user_data['UserRecord[username]'],
            'Delete'
        );
        $I->click($xpath);
        //$I->wait(1);
    }

}