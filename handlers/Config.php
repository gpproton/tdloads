<?php

final class Config {

    // Parameters
    public static $BASE_REAL_PATH;
    public static $STORAGE_PATH;
    public static $CACHE_PATH;
    public static $PASS_KEY;
    public static $AUTH_TYPE;
    public static $AUTH_TIMEOUT;
    public static $SESSION_KEY;

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
        self::$PASS_KEY = getenv('PASS_KEY');
        self::$AUTH_TYPE = getenv('AUTH_TYPE');
        self::$AUTH_TIMEOUT = getenv('AUTH_TIMEOUT');
        self::$SESSION_KEY = getenv('SESSION_KEY');

    }
}

