# w3bkit/flow-ui

Flow UI package

## Installation

```bash
composer require w3bkit/flow-ui
```

## Configuration

<sub>Configuration/FlowUI.yaml</sub>
```yaml
html:
  lang: en
viewport: 'width=device-width, initial-scale=1, user-scalable=no'
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

<sub>Index.fusion</sub>
```html
W3bkit.Demo.HomeController.index = W3bkit.Demo:HomeController.Index

prototype(W3bkit.Demo:HomeController.Index) < prototype(Neos.Fusion:Component) {

    content = afx`
        <span class='h1'>hello friend.</span>
    `

    renderer = afx`
        <W3bkit.Demo:Layout.Default content={props.content} />
    `

}
```

