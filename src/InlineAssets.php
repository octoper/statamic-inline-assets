<?php

namespace Octoper\InlineAssets;

use Illuminate\Support\HtmlString;
use Statamic\Tags\Tags;

class InlineAssets extends Tags
{
    public function index()
    {
        $asset = public_path(
            $this->get(['src', 'path'])
        );

        return new HtmlString(file_get_contents($asset));
    }
}
