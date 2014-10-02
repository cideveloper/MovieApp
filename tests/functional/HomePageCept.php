<?php
$I = new FunctionalTester($scenario);
$I->am('a MovieApp member');
$I->wantTo('Check if the home page works');
$I->amOnPage('/');
$I->see('This is my body content!');
