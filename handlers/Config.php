<?php

class Config {

    // Parameters
    public static $BASE_REAL_PATH;
    public static $STORAGE_PATH;
    public static $CACHE_PATH;

    public static function Load()
    {
        // Load env file on project path..
        $BASE_REAL_PATH = realpath(__DIR__ . '/..');
        $dotenv = Dotenv\Dotenv::createImmutable($BASE_REAL_PATH);
        $dotenv->load();

        ///// Variable configurations
        //
        self::$STORAGE_PATH = getenv('STORAGE_PATH');
        self::$CACHE_PATH = getenv('CACHE_PATH');

    }
}

