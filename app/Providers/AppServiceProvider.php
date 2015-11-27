<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\EntrySetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $closed = EntrySetting::getStatus();
        $image = EntrySetting::getEntrySiteBackgroundAttribute();
        $title = EntrySetting::getTitle();
        $description = html_entity_decode(EntrySetting::getDescription());

        view()->share(compact('closed', 'image', 'title', 'description'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
