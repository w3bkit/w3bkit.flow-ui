<?php

    namespace W3bkit\FlowUI\Controller;

    use Neos\Flow\Annotations as Flow;
    use Neos\Flow\Mvc\Controller\ActionController;
    use Neos\Flow\Mvc\View\ViewInterface;
    use Neos\Fusion\View\FusionView;

    /**
     * @property FusionView
     * @property array
     * 
     * @method initializeView(ViewInterface $view):void
     */
    abstract class FusionViewController extends ActionController {

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
         * @param ViewInterface $view
         * @return void
         */
        protected function initializeView(ViewInterface $view):void {
            $this->view->assign('FlowUIdocument', $this->flowUIconfig['document']);
        }

    }

?>