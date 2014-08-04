<?php  namespace Toddmcbrearty\Commander;

use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBus {

    private $commandBus;

    private $app;

    private $commandTranslator;


    function __construct(DefaultCommandBus $commandBus, Application $app, BasicCommandTranslator $commandTranslator)
    {
        $this->commandBus = $commandBus;
        $this->app = $app;
        $this->commandTranslator = $commandTranslator;
    }

    public function execute($command)
    {
        $validator = $this->commandTranslator->toValidator($command);

        if(class_exists($validator))
        {
            $this->app->make($validator)->validate($command);
        }

        return $this->commandBus->execute($command);
    }
} 