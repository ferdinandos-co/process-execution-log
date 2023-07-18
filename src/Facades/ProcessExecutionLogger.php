<?php

namespace FerdinandosCo\ProcessExecutionLog\Facades;

use Illuminate\Support\Facades\Facade;

class ProcessExecutionLogger extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProcessExecutionLogger';
    }
}
