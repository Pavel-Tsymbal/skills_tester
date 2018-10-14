<?php namespace App\Tests;

use App\Tests\FunctionalTester;

class LoginCest
{
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Hello guest!', 'h1');
        $I->click('log in');
        $I->fillField('_username', 'admin@admin.com');
        $I->fillField('_password', '1111');
        $I->click('Enter');
        $I->see('Hello! admin', 'h1');
    }
}
