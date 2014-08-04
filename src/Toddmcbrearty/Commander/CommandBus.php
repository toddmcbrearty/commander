<?php namespace Toddmcbrearty\Commander;

interface CommandBus
{
    public function execute($command);
}