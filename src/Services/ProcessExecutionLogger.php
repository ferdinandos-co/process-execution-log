<?php

namespace FerdinandosCo\ProcessExecutionLog\Services;

use Illuminate\Support\Facades\Log;

class ProcessExecutionLogger
{
    public function info(string $message)
    {
        // @Todo: Implement your logic for logging info messages
        Log::info('ProcessExecutionLogger::info');
    }

    public function notice(string $message)
    {
        // @Todo: Implement your logic for logging notice messages
        Log::info('ProcessExecutionLogger::notice');
    }

    public function error(string $message)
    {
        // @Todo: Implement your logic for logging error messages
        Log::info('ProcessExecutionLogger::error');
    }
}
