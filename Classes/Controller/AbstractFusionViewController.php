<?php

    namespace W3bkit\FlowUI\Controller;

    use Neos\Flow\Annotations as Flow;
    use Neos\Flow\Mvc\Controller\ActionController;
    use Neos\Flow\Mvc\View\ViewInterface;
    use Neos\Fusion\View\FusionView;

    /**
     * @property FusionView
     * 
     * @method initializeView(ViewInterface $view):void
     */
    abstract class AbstractFusionViewController extends ActionController {

        /**
         * @var FusionView
         */
        protected $defaultViewObjectName = FusionView::class;

        /**
         * @param ViewInterface $view
         * @return void
         */
        protected function initializeView(ViewInterface $view):void {
            
        }

    }

?>