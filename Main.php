<?php

require 'vendor/autoload.php';

class Main {

    public $Config;

    private $HandlerConfig = 'Handlers_Config';
    private $HandlerStream = 'Handlers_Stream';
    private $HelpersPath = 'helpers_path';

    public function __construct()
    {
        // Class Injections..
        Injector::loadClass($this->HandlerConfig);
        Injector::loadClass($this->HandlerStream);
        Injector::loadClass($this->HelpersPath);

        // Auto loads required classes
        Config::Load();
        Path::Load();

    }

    public function Run()
    {
        // Boot..

        // echo Config::$STORAGE_PATH;
        
        // echo Path::$fileRealPath;


        $tst = new Stream;
        $tst->Transfer();
    }
}
