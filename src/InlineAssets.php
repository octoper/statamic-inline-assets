<?php

namespace Octoper\InlineAssets;

use Statamic\Tags\Tags;

class InlineAssets extends Tags
{
    public function index()
    {
        $asset = public_path(
            $this->get(['src', 'path']),
        );

        return file_get_contents($asset);
    }
}
