<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Codespaces環境では無条件でHTTPSリンクを生成するように強制する
        URL::forceScheme('https');
    }
}