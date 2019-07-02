<?php
namespace Step\Acceptance;

class CRMServicesManagementSteps extends CRMGuestSteps
{
    const SERVICES_LIST_SELECTOR = '.grid-view';

    function amInListServicesUi()
    {
        $I = $this;
        $I->amOnPage('/services');
    }

    function clickOnRegisterNewServiceButton()
    {
        $I = $this;
        $I->click('Create');
    }

    function seeIAmInAddServiceUi()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/services/create');
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

    function seeServiceInList($service_data)
    {
        $I = $this;
        $I->see($service_data['ServiceRecord[name]'], self::SERVICES_LIST_SELECTOR);
    }

    function submitServiceDataForm()
    {
        $I = $this;
        $I->click('button[type=submit]');
        //$I->wait(1);
    }

    public function seeIAmInListServicesUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('/services/'); // this is regexp , not an URL
        $I->seeElement(self::SERVICES_LIST_SELECTOR);
    }
    public function seeIamInViewServiceUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('~services/view~'); // this is regexp, not an URL
        $I->see('Update');
        $I->see('Delete');
    }

    public function seeEditServiceUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('~services/update~'); // this is regexp, not an URL
        $I->see('Update');
    }

    public function dontSeeServiceInList($service_data)
    {
        $I = $this;
        $I->dontSee($service_data['ServiceRecord[name]'],
            self::SERVICES_LIST_SELECTOR
        );
    }

    public function seeEditButtonBesideService($service_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearServiceName(
            $service_data['ServiceRecord[name]'],
            'Update'
        );
        $I->seeElement($xpath);
    }

    private function makeXpathForButtonNearServiceName(
        $service_name,
        $button_title
    ) {
        $xpath = sprintf(
            '//td[text()="%s"]/following-sibling::td/a[@title="%s"]',
            $service_name,
            $button_title
        );
        return $xpath;
    }

    public function clickEditButtonBesideService($service_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearServiceName(
            $service_data['ServiceRecord[name]'],
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
        $I->cancelPopup();
    }

    public function confirmDeletion()
    {
        $I = $this;
        $I->acceptPopup();
    }

    public function seeDeleteButtonBesideService($service_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearServiceName(
            $service_data['ServiceRecord[name]'],
            'Delete'
        );
        $I->seeElement($xpath);
    }

    public function clickDeleteButtonBesideService($service_data)
    {
        $I = $this;
        $xpath = $this->makeXpathForButtonNearServiceName(
            $service_data['ServiceRecord[name]'],
            'Delete'
        );
        $I->click($xpath);
        $I->wait(1);
    }

}