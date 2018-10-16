<?php namespace App\Tests;

use App\Tests\FunctionalTester;

class LoginCest
{
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnRoute('main_page');
        $I->seeInTitle('Main page');
        $I->click('Log in');
        $I->fillField('_username', 'admin@admin.com');
        $I->fillField('_password', '1111');
        $I->click('Sign in');
        $I->seeInTitle('Main page');
    }
}
