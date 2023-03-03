<?php

	namespace W3bkit\FlowUI\Fusion;

	use Neos\Flow\Annotations as Flow;
	use Neos\Fusion\FusionObjects\AbstractFusionObject;

    use W3bkit\FlowUI\Service\ResourceService;
	use W3bkit\FlowUI\Service\TagService;

	/**
	 * @property ResourceService
     * @property TagService
	 * 
	 * @method evaluate():string
	 */
	class CDN extends AbstractFusionObject {

        /**
         * @Flow\Inject
         * @var ResourceService
         */
        protected $resourceService;

		/**
         * @Flow\Inject
         * @var TagService
         */
        protected $tagService;

		/**
		* @return string
		*/
		public function evaluate():string {
			$data = $this->fusionValue('data');
            $url = $data['url'];
            $integrity = array_key_exists('integrity', $data) ? $data['integrity'] : '';
            $crossorigin = array_key_exists('crossorigin', $data) ? $data['crossorigin'] : '';
            $type = $this->resourceService->filetype($url);
            switch( $type ) {
                case 'css':
                    return $this->tagService->build('link', '', array(
                        'href' => $url,
                        'rel' => 'stylesheet',
                        'integrity' => $integrity,
                        'crossorigin' => $crossorigin
                    ));
                case 'js':
                    return $this->tagService->build('script', '', array(
                        'src' => $url,
                        'integrity' => $integrity,
                        'crossorigin' => $crossorigin
                    ));
                default:
                    return '';
            }
		}
		
	}

?>