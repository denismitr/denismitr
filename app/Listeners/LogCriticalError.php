<?php

namespace App\Listeners;

use App\Events\CriticalErrorOccurred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogCriticalError
{
    /**
     * @param CriticalErrorOccurred $event
     */
    public function handle(CriticalErrorOccurred $event)
    {
        Log::critical($this->createLogRecord($event->error));
    }

    protected function createLogRecord(\Throwable $error): string
    {
        return vsprintf("Message: %s\n File: %s at line %d\n Trace: %s\n", [
            $error->getMessage(),
            $error->getFile(),
            $error->getLine(),
            $error->getTraceAsString(),
        ]);
    }
}
