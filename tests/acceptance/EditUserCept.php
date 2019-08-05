<?php
$I = new \Step\Acceptance\CRMUsersManagementSteps($scenario);
$I->wantTo('edit existing User record');

$I->amInListUsersUi();
$I->clickOnRegisterNewUserButton();
$I->seeIAmInAddUserUi();
$first_user = $I->imagineUser();
$I->fillUserDataForm($first_user);
$I->submitUserDataForm();

$I->amInListUsersUi();
$I->seeEditButtonBesideUser($first_user);
$I->clickEditButtonBesideUser($first_user);

$I->seeEditUserUi();
$new_data = $I->imagineUser();
$I->fillUserDataForm($new_data);
$I->submitUserDataForm();

$I->amInListUsersUi();
$I->seeUserInList($new_data);
$I->dontSeeUserInList($first_user);

