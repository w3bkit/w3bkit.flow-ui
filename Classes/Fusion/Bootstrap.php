<?php

    namespace W3bkit\FlowUI\Fusion;

    use Neos\Flow\Annotations as Flow;
    use Neos\Fusion\FusionObjects\AbstractFusionObject;

    use W3bkit\FlowUI\Service\ScssService;
    use W3bkit\FlowUI\Service\TagService;

    /**
     * 
     */
    class Bootstrap extends AbstractFusionObject {

        /**
         * @var array
         */
        protected $meta = [
            'style' => [
                'package' => 'twbs/bootstrap',
                'path' => 'scss/bootstrap.scss',
                'cache' => 'flowui-bs-css'
            ],
            'script' => [
                'package' => 'twbs/bootstrap',
                'path' => 'dist/js/bootstrap.js',
                'cache' => 'flowui-bs-js'
            ],
            'icons' => [
                'package' => 'twbs/bootstrap-icons',
                'path' => '???',
                'cache' => 'flowui-bs-icons'
            ]
        ];

        /**
         * @Flow\Inject
         * @var ScssService
         */
        protected $scssService;

        /**
         * @Flow\Inject
         * @var TagService
         */
        protected $tagService;

        /**
         * @return string
         */
        public function evaluate() {
            $tags = '';
            if( $this->fusionValue('style') ) {
                if( $this->fusionValue('cache') ) {
                    if( $this->cache->has($this->meta['style']['cache']) ) {
                        $css = $this->cache->get($this->meta['style']['cache']);
                    }
                    else {
                        $css = $this->scssService->compile($this->meta['style']['package'], $this->meta['style']['path']);
                        $this->cache->set($this->meta['style']['cache'], $css);
                    }
                }
                else {
                    $css = $this->scssService->compile($this->meta['style']['package'], $this->meta['style']['path']);
                }
                $tags .= $this->tagService->build('style', $css);
            }
            return $tags;
        }

    }

?>