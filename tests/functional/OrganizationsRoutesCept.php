<?php
$I = new TestGuy($scenario);
$I->am('a user');
$I->wantTo('test the organizations routes');

// index
$I->amOnRoute('organizations.index');
$I->seeCurrentUrlEquals('/organizations');
$I->seeCurrentActionIs('OrganizationsController@index');

$I->amOnAction('OrganizationsController@index');
$I->seeCurrentUrlEquals('/organizations');
$I->seeCurrentRouteIs('organizations.index');

//create
$I->amOnRoute('organizations.create');
$I->seeCurrentUrlEquals('/organizations/create');
$I->seeCurrentActionIs('OrganizationsController@create');

$I->amOnAction('OrganizationsController@create');
$I->seeCurrentUrlEquals('/organizations/create');
$I->seeCurrentRouteIs('organizations.create');