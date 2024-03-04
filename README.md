[![Latest Version](https://img.shields.io/github/release/octoper/statamic-inline-assets.svg?style=flat-square)](https://github.com/octoper/statamic-inline-assets/releases)
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=flat-square&link=https://statamic.com)

# Inline assets

> **Looking for maintainers**: As I'm not using Statamic these days and I don't have a the time to maintain the package I'm looking for anyone who want to take the ownerhip of it! You can reach out via email me@octoper.me

> Inline assets for Statamic

## Installation

Require it using Composer.

```
composer require octoper/statamic-inline-assets
```

## Inline Asset tag

Inline assets will inline your CSS or JS file to your HTML, or inline a file encoded with base64.

Inline assets can help you speed of your Statamic website by inlining critical CSS  you can check more about that by reading this article [Extract critical CSS](https://web.dev/extract-critical-css/)

## Templating

Pass a path to your file from the public directory to `inline_assets` tag.

```twig
<style>
{{ inline_assets:css src="css/site.css" }}
</style>
```

or

```twig
<script>
{{ inline_assets:js src="js/site.js" }}
</script>
```

You can also minify your js or css assets.

```twig
<script>
{{ inline_assets:js minify="true" src="js/site.js" }}
</script>
```

You usually got a chicken or the egg problem with critical css, so you can ignore if missing

```twig
<script>
{{ inline_assets:css ignore-missing="true" src="css/site.css" }}
</script>
```

You can also inline your file as an base64 encoded data stream, for example taking your favicon and including it inline.

```twig
<link rel="icon" type="image/x-icon" href="data:image/x-icon;base64,{{ inline_assets:base64 src="favicon.ico" }}"/>
```

You usually got a chicken or the egg problem with critical css, so you can ignore if missing

```twig
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,{{ inline_assets:base64 ignore-missing="true" src="favicons/favicon.svg" }}">
```


## Security

If you discover any security related issues, please email [me@octoper.me](mailto:me@octoper.me) instead of using the issue tracker.

## Credits

- [Vaggelis Yfantis](https://github.com/octoper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
