<?php 
$I = new \Step\Acceptance\CRMServicesManagementSteps($scenario);
$I->wantTo('edit existing Service record');

$I->amInListServicesUi();
$I->clickOnRegisterNewServiceButton();
$I->seeIAmInAddServiceUi();
$first_service = $I->imagineService();
$I->fillServiceDataForm($first_service);
$I->submitServiceDataForm();

$I->amInListServicesUi();
$I->seeEditButtonBesideService($first_service);
$I->clickEditButtonBesideService($first_service);

$I->seeEditServiceUi();
$new_data = $I->imagineService();
$I->fillServiceDataForm($new_data);
$I->submitServiceDataForm();

$I->amInListServicesUi();
$I->seeServiceInList($new_data);
$I->dontSeeServiceInList($first_service);

