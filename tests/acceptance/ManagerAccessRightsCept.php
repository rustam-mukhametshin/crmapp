<?php

use Step\Acceptance\CRMOperatorSteps;
use Step\Acceptance\CRMServicesManagementSteps;

$I = new CRMOperatorSteps($scenario);
$I->wantTo('check Manager-level access rights');

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
$I->see('Forbidden');

$I->amOnPage('/users/index');
$I->see('Forbidden');

$I->amOnPage('/users/view');
$I->see('Forbidden');

$I->logout();


$I = new CRMServicesManagementSteps($scenario);
$I->wantTo('Check Manager-level access rights for Services management');

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
$I->see('Forbidden');

$I->amOnPage('/users/index');
$I->see('Forbidden');

$I->amOnPage('/users/view');
$I->see('Forbidden');

$I->logout();