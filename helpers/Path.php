<?php

final class Path {

    public static $fileName;
    public static $fileExtension;
    public static $filePath;
    public static $fileRealPath;

    private static $queryString;
    private static $HandlersConfig = 'Handlers_Config';
    private static $HandlersQuery = 'Handlers_Query';

    public function __construct()
    { }

    private function relativeDir ($paths) {
        $filePath = '';
        foreach($paths as $pth)
        {
            $filePath .= $pth . '/';
        }
        return '/' . $filePath;
    }

    public static function Load()
    {
        Injector::loadClass(self::$HandlersConfig);
        Injector::loadClass(self::$HandlersQuery);

        self::$queryString = Query::Filter();

        self::$fileName = self::$queryString['filename'][0];
        self::$fileExtension = self::$queryString['ext'][0];

        self::$filePath = Config::$STORAGE_PATH
        .self::relativeDir(self::$queryString['path'])
        . self::$fileName . '.'
        . self::$fileExtension;

        self::$fileRealPath = realpath(self::$filePath);

        return;
    }

}
