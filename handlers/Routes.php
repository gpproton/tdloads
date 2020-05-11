<?php

class Routes {

    private static $HandlersQuery = 'Handlers_Query';
    private static $HandlersStream = 'Handlers_Stream';
    private static $HelpersUtils = 'Helpers_Utils';

    private static $RouteMode;
    private static $queryString;

    public function __construct()
    { }

    public static function Initialize()
    {
        // Initialize query class
        Injector::loadClass(self::$HandlersQuery);
        Injector::loadClass(self::$HandlersStream);
        Injector::loadClass(self::$HelpersUtils);

        self::$queryString = Query::Filter();

        if(count(self::$queryString) < 3 && self::$queryString['mode'] != null)
        {
            self::$RouteMode = 'start';
        }
        else
        {
            self::$RouteMode = self::$queryString['mode'][0];
        }

        switch(self::$RouteMode)
        {
            case 'start':
                self::StartController();
            break;
            case 'transfer':
                self::TrasferController();
            break;
            case 'auth':
                self::AuthController();
            break;
            case 'done':
                self::DoneController();
            break;
            case 'error':
                self::ErrorController();
            break;
            default:
                self::StartController();
            break;
        }

    }

    private function StartController()
    {
        Utils::viewLoader(self::$RouteMode);
        StartView::Render();
    }

    private function TrasferController()
    {
        Stream::Transfer();
    }

    private function DoneController()
    {
        Utils::viewLoader(self::$RouteMode);
        DoneView::Render();
    }

    private function ErrorController()
    {
        Utils::viewLoader(self::$RouteMode);
        ErrorView::Render();
    }

    private function AuthController()
    {
        Utils::viewLoader(self::$RouteMode);
        AuthView::Render();
    }

}
