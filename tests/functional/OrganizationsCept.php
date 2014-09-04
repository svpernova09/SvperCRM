<?php 
$I = new TestGuy($scenario);
$I->am('a user');
$I->wantTo('view the organizations index');

$I->amOnRoute('organizations.index');

$I->canSeeRecord('organizations');