<?php
$I = new \Step\Acceptance\CRMUsersManagementSteps($scenario);
$I->wantTo('register two Users in database.');

$I->amInListUsersUi();
$I->clickOnRegisterNewUserButton();
$I->seeIAmInAddUserUi();
$first_user = $I->imagineUser();
$I->fillUserDataForm($first_user);
$I->submitUserDataForm();
$I->seeIAmInViewUserUi();

$I->amInListUsersUi();
$I->seeUserInList($first_user);

$I->clickOnRegisterNewUserButton();
$I->seeIAmInAddUserUi();
$second_user = $I->imagineUser();
$I->fillUserDataForm($second_user);
$I->submitUserDataForm();
$I->seeIAmInViewUserUi();

$I->amInListUsersUi();
$I->seeUserInList($first_user);
$I->seeUserInList($second_user);

