<?php 

class UserLoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
$I->wantTo('sign in');
$I->amOnPage("/");
$I->fillField('uname1', "test123");
$I->fillField('l_password', "testis1234");



$I->click('submit');
$I->see('Welcome to gardenbelle');

    }
}
