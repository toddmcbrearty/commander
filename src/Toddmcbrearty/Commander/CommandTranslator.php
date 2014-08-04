<?php
/**
 * Created by PhpStorm.
 * User: todd
 * Date: 8/4/14
 * Time: 4:29 PM
 */
namespace Toddmcbrearty\Commander;

interface CommandTranslator
{
    public function toCommandHandler($command);

    public function toValidator($command);
}