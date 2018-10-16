<?php namespace App\Tests;
use App\Tests\FunctionalTester;

class RolesCest
{
    public function tryAnonToGetAdminPage(FunctionalTester $I)
    {
        $I->amOnRoute('admin_page');
        $I->seeInTitle('Login page');
    }

    public function tryAdminToGetAdminPage(FunctionalTester $I)
    {
        $I->amOnRoute('main_page');
        $I->click('Log in');
        $I->fillField('_username', 'admin@admin.com');
        $I->fillField('_password', '1111');
        $I->click('Sign in');
        $I->seeInTitle('Main page');
        $I->click('Admin page');
        $I->seeInTitle('Admin page');
    }

    public function tryUserToGetAdminPage(FunctionalTester $I)
    {
        $I->amOnRoute('admin_page');
        $I->seeInTitle('Login page');
        $I->fillField('_username', 'pavel@gmail.com');
        $I->fillField('_password', '1111');
        $I->click('Sign in');
        $I->seeInTitle('Access Denied. (403 Forbidden)');
    }
}
