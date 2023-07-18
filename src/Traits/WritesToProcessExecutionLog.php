<?php

namespace FerdinandosCo\ProcessExecutionLog\Traits;

use FerdinandosCo\ProcessExecutionLog\Models\ProcessExecutionLog;

trait WritesToProcessExecutionLog
{
    public $parentLog;

    public function setParentLog(ProcessExecutionLog $parentLog = null)
    {
        $this->parentLog = $parentLog;
    }

    public function logExecution($details = null)
    {
        $log = new ProcessExecutionLog();

        $class_name = get_class($this);

        $log->class_name = $class_name;

        // Explode the class name by backslash
        $class_name_parts = explode('\\', $class_name);

        // Check if first part of class name is set and equal to App or Database
        if (isset($class_name_parts[0]) && in_array($class_name_parts[0], ['App', 'Database'])) {
            // Check if second part of class name is set
            if (isset($class_name_parts[1])) {
                // Set the class type to the second part of the class name and remove last letter
                $log->class_type = substr($class_name_parts[1], 0, -1);
            }
        }

        $log->details = $details;

        if ($this->parentLog instanceof ProcessExecutionLog) {
            $log->parent_id = $this->parentLog->id;
        }

        $log->save();

        // Set the newly created log as the parent log for future executions
        $this->parentLog = $log;
    }

    protected function getExecutionType()
    {
        return 'unknown';
    }
}
