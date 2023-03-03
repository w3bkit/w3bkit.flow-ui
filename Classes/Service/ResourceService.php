<?php

    namespace W3bkit\FlowUI\Service;

    use Neos\Flow\Annotations as Flow;
    use Neos\Flow\ResourceManagement\ResourceManager;

    /**
     * @Flow\Scope("singleton")
     * 
     * @property ResourceManager
     * 
     * @method scan(string $path):array
     * @method find(string $package):string
     * @method tmp(string $path):string
     * @method filetype(string $file):string
     */
    class ResourceService {

        /**
         * @Flow\Inject
         * @var ResourceManager
         */
        protected $resourceManager;

        /**
         * @param string $path
         * @return array
         */
        public function scan(string $path):array {
            return array_diff(scandir($path), ['.', '..']);
        }

        /**
         * @param string $package
         * @return string
         */
        public function find(string $package):string {
            $packages = constant('FLOW_PATH_PACKAGES');
            $locations = $this->scan($packages);
            foreach( $locations as $location ) {
                $path = $packages . $location . '/' . $package;
                if( is_dir($path) ) {
                    return $path;
                }
            }
            return '';
        }

        /**
         * @param string $path
         * @return string
         */
        public function tmp(string $path):string {
            return $this->resourceManager->importResource($path)->createTemporaryLocalCopy();
        }

        /**
         * @param string $file
         * @return string
         */
        public function filetype(string $file):string {
            $dot = strrpos($file, '.');
            $type = substr($file, $dot + 1);
            return $type;
        }

    }

?>