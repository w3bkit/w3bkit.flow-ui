<?php

    namespace W3bkit\FlowUI;

    use Neos\Flow\Core\Bootstrap;
    use Neos\Flow\Configuration\ConfigurationManager;

    /**
     * @method boot(Bootstrap $bootstrap):void
     */
    class Package extends \Neos\Flow\Package\Package {

        /**
         * @param Bootstrap
         * @return void
         */
        public function boot(Bootstrap $bootstrap):void {
            $dispatcher = $bootstrap->getSignalSlotDispatcher();
            $dispatcher->connect(ConfigurationManager::class, 'configurationManagerReady',
                function (ConfigurationManager $configurationManager) {
                    $configurationManager->registerConfigurationType(
                        'FlowUI',
                        ConfigurationManager::CONFIGURATION_PROCESSING_TYPE_DEFAULT,
                        true
                    );
                }
            );
        }

    }

?>