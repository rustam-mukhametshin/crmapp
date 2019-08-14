<?php

use Step\Acceptance\CRMUsersManagementSteps;

$I = new CRMUsersManagementSteps($scenario);
$I->wantTo('check Admin-level access rights');

$I->amOnPage('/customers/query');
$I->dontSee('Forbidden');

$I->amOnPage('/customers/index');
$I->dontSee('Forbidden');

$I->amOnPage('/customers/add');
$I->dontSee('Forbidden');


$I->amOnPage('/services/create');
$I->dontSee('Forbidden');

$I->amOnPage('/services/index');
$I->dontSee('Forbidden');

$I->amOnPage('/services/view');
$I->dontSee('Forbidden');


$I->amOnPage('/users/create');
$I->dontSee('Forbidden');

$I->amOnPage('/users/index');
$I->dontSee('Forbidden');

$I->amOnPage('/users/view');
$I->dontSee('Forbidden');

$I->logout();
