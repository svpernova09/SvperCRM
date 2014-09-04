<?php
$I = new TestGuy($scenario);
$I->am('a user');
$I->wantTo('test the organizations routes');

$I->amOnRoute('organizations.index');
$I->seeCurrentUrlEquals('/organizations');
$I->seeCurrentActionIs('OrganizationsController@index');

$I->amOnAction('OrganizationsController@index');
$I->seeCurrentUrlEquals('/organizations');
$I->seeCurrentRouteIs('organizations.index');