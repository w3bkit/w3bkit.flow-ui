# w3bkit/flow-ui

Flow UI package

## Installation

```bash
composer require w3bkit/flow-ui
```

## Configuration

Since there are fallbacks, most of this settings are optional.
However if you want to include Bootstrap CSS, this value has to be `true`.
This example shows available settings and there default value.

<sub>Configuration/FlowUI.yaml</sub>
```yaml
html:
  lang: en
viewport:
  width: device-width
  scale: 1
bootstrap:
  include: false
```

## Usage

Include the Fusion files:

<sub>Resources/Private/Fusion/Root.fusion</sub>
```yaml
include: resource://W3bkit.FlowUI/Private/Fusion/Root.fusion
include: **/*.fusion
```

Creating a custom layout:

<sub>Resources/Private/Fusion/Layouts/Custom.fusion</sub>
```html
prototype(W3bkit.Demo:Layout.Custom) < prototype(W3bkit.FlowUI:Layout) {
    page = afx`
        <main id='flowui-main-wrapper'>
            <!-- Components -->
            {props.content}
            <!-- Components -->
        </main>
    `
}
```

Use the custom layout:

<sub>Classes/Controller/HomeController.php</sub>
```php
<?php

    namespace W3bkit\Demo\Controller;
    
    use W3bkit\FlowUI\Controller\FusionViewController;

    /**
     * @method indexAction():void
     */
    class HomeController extends FusionViewController {

        /**
         * @return void
         */
        public function indexAction():void {
            
        }

    }

?>
```

<sub>Resources/Private/Fusion/Controller/Home/Index.fusion</sub>
```html
W3bkit.Demo.HomeController.index = W3bkit.Demo:HomeController.Index

prototype(W3bkit.Demo:HomeController.Index) < prototype(Neos.Fusion:Component) {

    content = afx`
        <span class='h1'>hello friend.</span>
    `

    renderer = afx`
        <W3bkit.Demo:Layout.Custom content={props.content} />
    `

}
```

