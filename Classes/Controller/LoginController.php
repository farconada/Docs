<?php
declare(ENCODING = 'utf-8') ;
namespace F3\Docs\Controller;

/*
* ComentarioController
*
*
*/
class LoginController extends \F3\FLOW3\MVC\Controller\ActionController
{
    /**
     * @inject
     * @var \F3\FLOW3\Security\Authentication\AuthenticationManagerInterface
     */
    protected $authenticationManager;

    /**
     *
     *
     * @return string
     */
    public function indexAction()
    {

    }

    /**
     * Authenticates an account by invoking the Provider based Authentication Manager.
     *
     *
     * @return void
     */
    public function authenticateAction()
    {
        try {
            $this->authenticationManager->authenticate();
            $this->redirect('index', 'Documento');
        } catch (\F3\FLOW3\Security\Exception\AuthenticationRequiredException $exception) {
            $this->flashMessageContainer->add('Wrong username or password.');
            throw $exception;
        }
    }

    /**
     *
     * @return void
     */
    public function logoutAction()
    {
        $this->authenticationManager->logout();
        $this->flashMessageContainer->add('Successfully logged out.');
        $this->redirect('index', 'Documento');
    }


}
