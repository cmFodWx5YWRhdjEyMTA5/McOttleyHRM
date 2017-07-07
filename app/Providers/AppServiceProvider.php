<?php

namespace McPersona\Providers;

use Illuminate\Support\ServiceProvider;
use McPersona\Models\Notifications;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //its just a dummy data object.
    $notifications = Notifications::get();

    // Sharing is caring
    view()->share('notifications', $notifications);
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
