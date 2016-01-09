<?php
use tests\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that Redirects works');

$loginPage = LoginPage::openBy($I);
$I->see('Sign in', 'h3');
$I->amGoingTo('try to login with correct credentials');
$loginPage->login('admin', 'admin');
$I->amGoingTo('try to view redirects');
$I->amOnPage('/redirects');

$I->see('Redirects', 'h1');
$I->makeScreenshot('success-redirects-index');