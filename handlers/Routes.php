<?php

final class Routes {

    private static $HandlersQuery = 'Handlers_Query';
    private static $HandlersStream = 'Handlers_Stream';
    private static $HelpersUtils = 'Helpers_Utils';

    private static $RouteMode;
    private static $queryString;

    // Fixed tags for query strings
    const QUERY_MODE = 'mode';
    const STATE_TAGS = array(
        'start',
        'transfer',
        'auth',
        'done',
        'error'
    );

    public function __construct()
    { }

    public static function Initialize()
    {
        // Initialize query class
        Injector::loadClass(self::$HandlersQuery);
        Injector::loadClass(self::$HandlersStream);
        Injector::loadClass(self::$HelpersUtils);

        self::$queryString = Query::Filter();

        if(count(self::$queryString) < 3 && self::$queryString[self::QUERY_MODE] != null)
        {
            self::$RouteMode = self::STATE_TAGS[0];
        }
        else
        {
            self::$RouteMode = self::$queryString[self::QUERY_MODE][0];
        }

        switch(self::$RouteMode)
        {
            case self::STATE_TAGS[0]:
                self::StartController();
            break;
            case self::STATE_TAGS[1]:
                self::TrasferController();
            break;
            case self::STATE_TAGS[2]:
                self::AuthController();
            break;
            case self::STATE_TAGS[3]:
                self::DoneController();
            break;
            case self::STATE_TAGS[4]:
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
