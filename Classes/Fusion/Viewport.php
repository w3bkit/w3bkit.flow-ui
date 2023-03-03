<?php

    namespace W3bkit\FlowUI\Fusion;

    use Neos\Flow\Annotations as Flow;
    use Neos\Fusion\FusionObjects\AbstractFusionObject;

    use W3bkit\FlowUI\Service\TagService;

    /**
     * @property TagService
     * 
     * @method evaluate():string
     */
    class Viewport extends AbstractFusionObject {

        /**
         * @Flow\Inject
         * @var TagService
         */
        protected $tagService;

        /**
        * @return string
        */
        public function evaluate():string {
            return $this->tagService->build('meta', '', array(
                'name' => 'viewport',
                'content' => implode(', ', array(
                    'width=' . $this->fusionValue('width'),
                    'initial-scale=' . $this->fusionValue('scale')
                ))
            ));
        }
        
    }

?>