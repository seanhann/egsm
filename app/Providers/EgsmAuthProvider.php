<?php namespace App\Providers;

use Models\egsm\User;
use App\Auth\EgsmUserProvider;
use Illuminate\Support\ServiceProvider;

class EgsmAuthProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('egsm',function()
        {
            return new EgsmUserProvider(new User);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
