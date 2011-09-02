<?php
namespace Fernando\Docs\Command;
/**
 * The setup controller for the Blog package, for setting up some
 * data to play with.
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @scope singleton
 */
class UserCommandController extends \TYPO3\FLOW3\MVC\Controller\CommandController
{

    /**
     * @inject
     * @var \TYPO3\FLOW3\Security\AccountRepository
     */
    protected $accountRepository;

    /**
     * @inject
     * @var \TYPO3\FLOW3\Security\AccountFactory
     */
    protected $accountFactory;


    /**
     * Añade un usuario
     *
     * @param string $username
     * @param string $password
     * @param string $role
     * @return string
     */
    public function adduserCommand($username, $password, $role='Editor')
    {
        $account = $this->accountFactory->createAccountWithPassword($username, $password, array($role));
        $this->accountRepository->add($account);
        return 'La cuenta ha sido creada'. PHP_EOL;
    }
}