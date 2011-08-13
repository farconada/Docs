<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

require_once 'mink/autoload.php';
//
// Require 3rd-party libraries here:
//
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $browserSession;
    private $parameters;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;

        $driver = new \Behat\Mink\Driver\GoutteDriver();
        $this->browserSession = new \Behat\Mink\Session($driver);
        $this->browserSession->start();
    }

    /**
     * @Given /^I am on "([^"]*)"$/
     */
    public function iAmOn($relativeUrl)
    {

        $this->browserSession->visit($this->parameters['base_url'].$relativeUrl);
    }

    /**
     * @When /^I am not logged in$/
     */
    public function iAmNotLoggedIn()
    {
        $this->browserSession->visit($this->parameters['base_url'].'/docs/login/logout');
    }

    /**
     * @Then /^I could only login and logout$/
     */
    public function iCouldOnlyLoginAndLogout()
    {
        $elements = $this->browserSession->getPage()->findAll('css','nav .menu a');
        assertEquals(2,count($elements));
    }

    /**
     * @When /^I logged in$/
     */
    public function iLoggedIn()
    {
        $form = $this->browserSession->getPage()->find('css', '#loginscreen form');
        $usernameField = $form->findField('TYPO3[FLOW3][Security][Authentication][Token][UsernamePassword][username]');
        $usernameField->setValue('fernando');
        $passwordField = $form->findField('TYPO3[FLOW3][Security][Authentication][Token][UsernamePassword][password]');
        $passwordField->setValue('fernando');
        $submitButton =  $this->browserSession->getPage()->find('css','#loginscreen form input[type="submit"]');
        $submitButton->press();
    }

    /**
     * @Then /^I could see more options than anonymous$/
     */
    public function iCouldSeeMoreOptionsThanAnonymous()
    {
        $elements = $this->browserSession->getPage()->findAll('css','nav .menu a');
        assertGreaterThan(2,count($elements));
    }
//
}
