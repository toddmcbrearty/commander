<?php namespace Toddmcbrearty\Commander;


interface CommandHandler {

    /**
     * Handle the command
     * @param $command
     *
     * @return mixed
     */
    public function handle($command);

} 