<?php

namespace FerdinandosCo\ProcessExecutionLog;

use Illuminate\Support\ServiceProvider;
use FerdinandosCo\ProcessExecutionLog\Services\ProcessExecutionLogger;

class ProcessExecutionLogServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //...
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ProcessExecutionLogger', function ($app) {
            return new ProcessExecutionLogger();
        });
    }
}
