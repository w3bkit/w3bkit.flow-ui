<?php

    namespace W3bkit\FlowUI\Fusion;

    use Neos\Flow\Annotations as Flow;
    use Neos\Fusion\FusionObjects\AbstractFusionObject;

    /**
     * @method evaluate():string
     */
    class Layout extends AbstractFusionObject {

        /**
         * @return string
         */
        public function evaluate():string {
            return $this->fusionValue('renderer');
        }

    }

?>