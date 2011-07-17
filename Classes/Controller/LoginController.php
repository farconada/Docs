<?php
declare(ENCODING = 'utf-8') ;
namespace Fernando\Docs\Controller;

/*
* ComentarioController
*
*
*/
class LoginController extends \TYPO3\FLOW3\MVC\Controller\ActionController
{
    /**
     * @inject
     * @var \TYPO3\FLOW3\Security\Authentication\AuthenticationManagerInterface
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
        } catch (\TYPO3\FLOW3\Security\Exception\AuthenticationRequiredException $exception) {
            $this->flashMessageContainer->add('Usuario o password incorrectos.');
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
        $this->flashMessageContainer->add('Acaba de salir correctamente.');
        $this->redirect('index', 'Login');
    }


}
