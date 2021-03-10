<?php

namespace Octoper\InlineAssets;

use Illuminate\Support\HtmlString;
use MatthiasMullie\Minify;
use Statamic\Tags\Tags;

class InlineAssets extends Tags
{
    public function js(): HtmlString
    {
        $asset = public_path(
            $this->params->get(['src', 'path'])
        );

        if ($this->params->bool('ignore-missing')) {
            $response = is_file($asset) ? file_get_contents($asset) : '';
        } else {
            $response = file_get_contents($asset);
        }

        if ($this->params->bool('minify')) {
            $minifier = new Minify\JS($asset);
            $response = $minifier->minify();
        }

        return new HtmlString($response);
    }

    public function css(): HtmlString
    {
        $asset = public_path(
            $this->params->get(['src', 'path'])
        );

        if ($this->params->bool('ignore-missing')) {
            $response = is_file($asset) ? file_get_contents($asset) : '';
        } else {
            $response = file_get_contents($asset);
        }

        if ($this->params->bool('minify')) {
            $minifier = new Minify\CSS($asset);
            $response = $minifier->minify();
        }

        return new HtmlString($response);
    }

    public function img(): HtmlString
    {
        $asset = public_path(
            $this->params->get(['src', 'path'])
        );

        $content = file_get_contents($asset);
        $mimetype = mime_content_type($asset);

        // ensure +xml at end for svg files
        if (strpos($mimetype, 'svg') !== false) {
            $mimetype = rtrim($mimetype, '+xml').'+xml';
        }

        return new HtmlString('data:'.$mimetype.';base64,'.base64_encode($content));
    }
}
