<?php  namespace Toddmcbrearty\Commander\Events;

class EventListener
{

    public function handle($event)
    {
        $eventName = $this->getEventName($event);

        if( $this->listenerIsRegistered($eventName))
        {
            return call_user_func([$this, 'when'.$eventName], $event);
        }
    }

    /**
     * @param $event
     *
     * @return string
     */
    public function getEventName($event)
    {
        return (new \ReflectionClass($event))->getShortName();
    }

    /**
     * @param $event
     * @param $method
     *
     * @return mixed
     */
    public function listenerIsRegistered($eventName)
    {
        $method = "when{$eventName}";

        return method_exists($this, $method);
    }
} 