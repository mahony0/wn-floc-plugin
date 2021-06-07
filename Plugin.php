<?php

namespace Mahony0\Floc;

use Illuminate\Contracts\Http\Kernel;
use Mahony0\Floc\Classes\NoFLoCMiddleware;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            "name" => "Disable FLoC",
            "description" => "Plugin for disabling FLoC on WinterCMS",
            "author" => "Mahony0",
            "icon" => "icon-google"
        ];
    }

    public function boot()
    {
        if ($isActive = env('DISABLE_FLOC', false)) {
            $kernel = $this->app->make(Kernel::class);
            $kernel->pushMiddleware(NoFLoCMiddleware::class);
        }
    }
}
