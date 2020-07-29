<?php

namespace Octoper\InlineAssets;

use Illuminate\Support\HtmlString;
use Statamic\Tags\Tags;
use MatthiasMullie\Minify;

class InlineAssets extends Tags
{
    public function js(): HtmlString
    {
        $asset = public_path(
            $this->params->get(['src', 'path'])
        );

        $response = file_get_contents($asset);

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

        $response = file_get_contents($asset);

        if ($this->params->bool('minify')) {
            $minifier = new Minify\CSS($asset);
            $response = $minifier->minify();
        }

        return new HtmlString($response);
    }

}
