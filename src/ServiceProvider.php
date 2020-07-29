<?php

namespace Octoper\InlineAssets;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        InlineAssets::class,
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
