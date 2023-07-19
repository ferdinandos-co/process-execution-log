# Process Execution Log

## Laravel Process Execution Logging made simple

Keep track of all your process executions and conveniently log all their activities.

## Installation

You can install via composer:

```command
composer require ferdinandos-co/process-execution-log dev-main
```

Run the migrations.

```command
php artisan migrate --path=vendor/ferdinandos-co/process-execution-log/src/migrations
```

## Usage

Use the WritesToProcessExecutionLog trait in any class where you want to enable process execution logging.

```php
use FerdinandosCo\ProcessExecutionLog\Traits\WritesToProcessExecutionLog;

class YourClass {

    use WritesToProcessExecutionLog;

}
```

In classes where you've added the WritesToProcessExecutionLog trait,
use the ProcessExecutionLogger facade to add more in-depth logging.

```php
// Write some info to the log
$this->info('Some info log.');

// Write a notice to the log
$this->notice('Some notice log.');

// Write an error to the log
$this->error('Some error log.');
```

You can access the model ProcessExecutionLog like this:

```php
use FerdinandosCo\ProcessExecutionLog\Models\ProcessExecutionLog;

$logs = ProcessExecutionLog::all();
```

That's it!

With this, you're now able to write to the ProcessExecutionLog from your classes.

## License

ProcessExecutionLog is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT).
