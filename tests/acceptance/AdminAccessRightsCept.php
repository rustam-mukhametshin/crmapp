<?php

use Step\Acceptance\CRMUsersManagementSteps;

$I = new CRMUsersManagementSteps($scenario);
$I->wantTo('check Admin-level access rights');

$I->amOnPage('/customers/query');
$I->dontSee('Forbidden');

$I->amOnPage('/customers/index');
$I->dontSee('Forbidden');

$I->amOnPage('/users/create');
$I->dontSee('Forbidden');

$I->amOnPage('users/index');
$I->dontSee('Forbidden');
