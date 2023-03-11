<?php

    namespace W3bkit\FlowUI\Controller;

    use Neos\Flow\Annotations as Flow;
    use Neos\Flow\Mvc\ActionRequest;
    use Neos\Fusion\View\FusionView;
    use Neos\Flow\Mvc\View\ViewInterface;
    use Neos\Flow\Security\Authentication\Controller\AbstractAuthenticationController;

    /**
     * @property FusionView
     * @property array
     * @method onAuthenticationSuccess(ActionRequest):void
     * @method logoutAction():void
     * @method initializeView(ViewInterface $view):void
     */
    abstract class AuthenticationController extends AbstractAuthenticationController {

        /**
         * @var FusionView
         */
        protected $defaultViewObjectName = FusionView::class;

        /**
         * @Flow\InjectConfiguration(type="FlowUI")
         * @var array
         */
        protected $flowUIconfig = array();

        /**
         * @param ActionRequest $originalRequest
         * @return void
         */
        protected function onAuthenticationSuccess(ActionRequest $originalRequest = null):void {
            if( $originalRequest !== null ) {
                $this->redirectToRequest($originalRequest);
            }
            $this->redirect('index', 'Home', 'W3bkit.Lotus');
        }

        /**
         * @return void
         */
        public function logoutAction():void {
            parent::logoutAction();
            $this->redirect('index');
        }

        /**
         * @param ViewInterface $view
         * @return void
         */
        protected function initializeView(ViewInterface $view):void {
            $this->view->assign('FlowUIdocument', $this->flowUIconfig['document']);
        }

    }

?>