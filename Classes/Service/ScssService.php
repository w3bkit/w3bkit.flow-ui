<?php

    namespace W3bkit\FlowUI\Service;

    use Neos\Flow\Annotations as Flow;

    use W3bkit\FlowUI\Service\ResourceService;

    /**
     * @Flow\Scope("singleton")
     * 
     * @property ResourceService
     * 
     * @method compile(string $package, string $path):string
     */
    class ScssService {

        /**
         * @Flow\Inject
         * @var ResourceService
         */
        protected $resourceService;

        /**
         * @param string $package
         * @param string $path
         * @return string
         */
        public function compile(string $package, string $path):string {
            $directory = $this->resourceService->find($package);
            $segments = explode('/', $path);
            $filename = array_pop($segments);
            $subdirectory = '';
            foreach( $segments as $segment ) {
                $subdirectory .= '/' . $segment;
            }
            $filepath = $directory . '/' . $path;
            $file = $this->resourceService->tmp($filepath);
            $scss = file_get_contents($file);

            $compiler = new \ScssPhp\ScssPhp\Compiler();
            $compiler->addImportPath($directory . $subdirectory);
            $compiler->setOutputStyle(\ScssPhp\ScssPhp\OutputStyle::COMPRESSED);
            $css = $compiler->compile($scss);
            return $css;
        }

    }

?>