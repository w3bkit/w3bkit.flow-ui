<?php

	namespace W3bkit\FlowUI\Fusion;

	use Neos\Flow\Annotations as Flow;
	use Neos\Fusion\FusionObjects\AbstractFusionObject;

	/**
	 * @method evaluate():string
	 */
	class Viewport extends AbstractFusionObject {

		/**
		* @return string
		*/
		public function evaluate():string {
			$width = $this->fusionValue('width');
			$scale = $this->fusionValue('scale');
			return 'width=' . $width . ', initial-scale=' . $scale;
		}
	}

?>