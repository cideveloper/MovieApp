<?php
$I = new FunctionalTester($scenario);
$I->am('MovieApp Member');
$I->wantTo('sign in to my MovieApp account');
$I->amOnPage('/login');
$I->fillField('email', 'test@test.com');
$I->fillField('password', 'test');
$I->click('Sign In');
$I->amOnPage('/');
$I->see('Welcome back!');
$I->assertTrue(Auth::check());