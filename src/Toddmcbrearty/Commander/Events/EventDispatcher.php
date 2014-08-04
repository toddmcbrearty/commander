<?php  namespace Toddmcbrearty\Commander\Events;

use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

class EventDispatcher
{

    protected $event;
    protected $log;

    function __construct(Dispatcher $event, Writer $log)
    {
        $this->event = $event;
        $this->log = $log;
    }

    public function dispatch(array $events)
    {
        foreach ($events as $event)
        {
            $eventName = $this->getEventName($event);

            $this->event->fire($eventName, $event);

            $this->log->info("$eventName was fired");
        }
    }

    /**
     * @param $event
     *
     * @return mixed
     */
    public function getEventName($event)
    {
        $eventName = str_replace('\\', '.', get_class($event));

        return $eventName;
    }
} 