<?php

namespace Step\Acceptance;

class CRMUserSteps extends \AcceptanceTester
{
    function amInQueryCustomerUi()
    {
        $I = $this;
        $I->amOnPage('/customers/query');
    }

    function fillInPhoneFieldWithDataForm($customer_data)
    {
        $I = $this;
        $I->fillField(
            'PhoneRecord[number]',
            $customer_data['PhoneRecord[number]']
        );
    }

    function clickSearchButton()
    {
        $I = $this;
        $I->click('Search');
    }

    public function seeIAmInListCustomersUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('/customers/');
    }

    function seeCustomerInList($customer_data)
    {
        $I = $this;
        $I->see($customer_data['CustomerRecord[name]'], '#search_results');
    }

    function dontSeeCustomerInList($customer_data)
    {
        $I = $this;
        $I->dontSee($customer_data['CustomerRecord[name]'], '#search_results');
    }
}