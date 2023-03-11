<?php

    namespace W3bkit\FlowUI\Command;

    use Neos\Flow\Annotations as Flow;
    use Neos\Flow\Cli\CommandController;

    use W3bkit\FlowUI\Service\AccountService;

    /**
     * @Flow\Scope("singleton")
     * @property AccountService
     */
    class AccountCommandController extends CommandController {

        /**
         * @Flow\Inject
         * @var AccountService
         */
        protected $accountService;

        /**
         * @param string $username
         * @param string $password
         * @param string $role
         * @return void
         */
        public function createAdminCommand(string $username, string $password, string $role = 'admin'):void {
            $roles = array($role);
            if( $this->accountService->create($username, $password, $roles) ) {
                $this->outputLine('Account \'%s\' created.', array($username));
            }
            else {
                $this->outputLine('Account not created.');
            }
        }

    }

?>