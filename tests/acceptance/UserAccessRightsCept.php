<?php

use Step\Acceptance\CRMUserSteps;

$I = new CRMUserSteps($scenario);
$I->wantTo('Check User-level access rights');

$I->amOnPage('/customers/query');
$I->dontSee('Forbidden');

$I->amOnPage('/customers/index');
$I->dontSee('Forbidden');

$I->amOnPage('/customers/add');
$I->see('Forbidden');


$I->amOnPage('/services/create');
$I->see('Forbidden');

$I->amOnPage('/services/index');
$I->see('Forbidden');

$I->amOnPage('/services/view');
$I->see('Forbidden');


$I->amOnPage('/users/create');
$I->see('Forbidden');

$I->amOnPage('/users/index');
$I->see('Forbidden');

$I->amOnPage('/users/view');
$I->see('Forbidden');
