<?php namespace App\Tests;
use App\Tests\FunctionalTester;

class RegisterCest
{
    public function tryRegister(FunctionalTester $I)
    {
        $I->amOnRoute('main_page');
        $I->seeInTitle('Main page');
        $I->click('Sign up');
        $I->fillField('user[name]', 'test');
        $I->fillField('user[email]', 'test@test.com');
        $I->fillField('user[password][first]', '1111');
        $I->fillField('user[password][second]', '1111');
        $I->click('Sign Up');
        $I->seeInTitle('Login page');
        $I->fillField('_username', 'test@test.com');
        $I->fillField('_password', '1111');
        $I->click('Sign in');
        $I->seeInTitle('Main page');
    }
}
