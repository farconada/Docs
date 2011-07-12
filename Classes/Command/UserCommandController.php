<?php
namespace F3\Docs\Command;
/**
 * The setup controller for the Blog package, for setting up some
 * data to play with.
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @scope singleton
 */
class UserCommandController extends \F3\FLOW3\MVC\Controller\CommandController
{

    /**
     * @inject
     * @var \F3\FLOW3\Security\AccountRepository
     */
    protected $accountRepository;

    /**
     * @inject
     * @var \F3\FLOW3\Security\AccountFactory
     */
    protected $accountFactory;


    /**
     * @param string $username
     * @param string $password
     * @param string $role
     * @return void
     */
    public function addUserCommand($username='admin', $password='admin', $role='Editor')
    {
        $account = $this->accountFactory->createAccountWithPassword($username, $password, array($role));
        $this->accountRepository->update($account);
        return 'La cuenta ha sido creada';
    }
}