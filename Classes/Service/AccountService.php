<?php

    namespace W3bkit\FlowUI\Service;

    use Neos\Flow\Annotations as Flow;
    use Neos\Flow\Security\Account;
    use Neos\Flow\Security\AccountFactory;
    use Neos\Flow\Security\AccountRepository;
    use Neos\Flow\Security\Cryptography\HashService;

    /**
     * @property AccountFactory
     * @property AccountRepository
     * @property HashService
     * @method create(string $username, string $password, array $roles):Account|null
     */
    class AccountService {

        /**
         * @Flow\Inject
         * @var AccountFactory
         */
        protected $accountFactory;

        /**
         * @Flow\Inject
         * @var AccountRepository
         */
        protected $accountRepository;

        /**
         * @Flow\Inject
         * @var HashService
         */
        protected $hashService;

        /**
         * @param string $username
         * @param string $password
         * @param array $roles
         * @return Account|null
         */
        public function create(string $username, string $password, array $roles):Account|null {
            if( empty($roles) ) {
                return null;
            }
            foreach( $roles as $key => $role ) {
                $roles[$key] = 'W3bkit.FlowUI:' . $role;
            }
            $authenticationProviderName = 'W3bkit.FlowUI:Authentication';
            $account = $this->accountFactory->createAccountWithPassword(
                $username,
                $password,
                $roles,
                $authenticationProviderName
            );
            if( $account ) {
                $this->accountRepository->add($account);
            }
            return $account;
        }

        /**
         * 
         */
        public function update(Account $account) {

        }

        /**
         * 
         */
        public function delete(Account $account) {
            $this->accountRepository->remove($account);
        }

    }

?>