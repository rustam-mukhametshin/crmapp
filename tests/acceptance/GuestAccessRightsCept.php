<?php

use Step\Acceptance\CRMGuestSteps;

$I = new CRMGuestSteps($scenario);
$I->wantTo('check guest access rights');

$I->amOnPage('/customers/query');
$I->seeElement('#login-form');

$I->amOnPage('/customers/index');
$I->seeElement('#login-form');


$I->amOnPage('/customers/add');
$I->seeElement('#login-form');

$I->amOnPage('/services/create');
$I->seeElement('#login-form');

$I->amOnPage('/services/index');
$I->seeElement('#login-form');

$I->amOnPage('/services/view');
$I->seeElement('#login-form');


$I->amOnPage('/users/create');
$I->seeElement('#login-form');

$I->amOnPage('/users/index');
$I->seeElement('#login-form');

$I->amOnPage('/users/view');
$I->seeElement('#login-form');