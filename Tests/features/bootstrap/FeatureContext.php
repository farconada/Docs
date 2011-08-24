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
    /**
     * @var \Behat\Mink\Session
     */
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
        $previousUrl = $this->browserSession->getCurrentUrl();
        $this->browserSession->visit($this->parameters['base_url'].'/index.php');
        $form = $this->browserSession->getPage()->find('css', '#loginscreen form');
        $usernameField = $form->findField('TYPO3[FLOW3][Security][Authentication][Token][UsernamePassword][username]');
        $usernameField->setValue('fernando');
        $passwordField = $form->findField('TYPO3[FLOW3][Security][Authentication][Token][UsernamePassword][password]');
        $passwordField->setValue('fernando');
        $submitButton =  $this->browserSession->getPage()->find('css','#loginscreen form input[type="submit"]');
        $submitButton->press();
        $this->browserSession->visit($previousUrl);
    }

    /**
     * @Then /^I could see more options than anonymous$/
     */
    public function iCouldSeeMoreOptionsThanAnonymous()
    {
        $elements = $this->browserSession->getPage()->findAll('css','nav .menu a');
        assertGreaterThan(2,count($elements));
    }

    /**
     * @Then /^I have valid XML$/
     */
    public function iHaveValidXML()
    {
        $pageContent = $this->browserSession->getPage()->getContent();
        assertTrue($this->is_valid_xml($pageContent));

    }

    /**
    *  Takes XML string and returns a boolean result where valid XML returns true
    */
    private function is_valid_xml ( $xml ) {
        libxml_use_internal_errors( true );
        $doc = new DOMDocument();
        //$doc->resolveExternals = TRUE;
        $doc->loadXML( $xml);
        $errors = libxml_get_errors();
        if (!empty($errors)) {
            //ignore "Tag XXXX invalid" error
            foreach ($errors as $key => $errorObj) {
                if ($errorObj->code == 801) {
                    unset($errors[$key]);
                }
            }
            if (!empty($errors)) {
                var_dump($errors);
            }
        }
        return empty( $errors );
    }

//
}
