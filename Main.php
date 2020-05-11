<?php

require 'vendor/autoload.php';

class Main {

    public $Config;

    private $HandlerConfig = 'Handlers_Config';
    private $HandlerStream = 'Handlers_Stream';
    private $HelpersPath = 'helpers_path';
    private $HandlerRoutes = 'Handlers_Routes';

    public function __construct()
    {
        // Class Injections..
        Injector::loadClass($this->HandlerConfig);
        Injector::loadClass($this->HandlerStream);
        Injector::loadClass($this->HelpersPath);
        Injector::loadClass($this->HandlerRoutes);

        // Auto loads required classes
        Config::Load();
        Path::Load();

    }

    public function Run()
    {
        // Boot..

        // echo Config::$STORAGE_PATH;
        
        // echo var_dump(Path::$fileRealPath);


        // $tst = new Stream;
        // $tst->Transfer();

        Routes::Initialize();
    }
}
