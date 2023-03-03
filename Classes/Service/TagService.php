<?php

    namespace W3bkit\FlowUI\Service;

    use Neos\Flow\Annotations as Flow;

    /**
     * @Flow\Scope("singleton")
     * 
     * @method build(string $name, string $content = '', array $attributes = array()):string
     */
    class TagService {

        /**
         * @param string $name
         * @param string $content
         * @param array $attributes
         * @return string
         */
        public function build(string $name, string $content = '', array $attributes = array()):string {
            $open = '<' . $name;
            foreach( $attributes as $key => $value ) {
                $open .= ' ' . $key . '="' . $value . '"';
            }
            $open .= $content ? '>' : '/>';
            if( !$content ) {
                return $open;
            }
            $close = '</' . $name . '>';
            return $open . $content . $close;
            
        }

    }

?>