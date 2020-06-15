<?php

final class Routes {

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

        self::$queryString = Query::Filter();

        if(count(self::$queryString) < 3 && self::$queryString[self::QUERY_MODE] != null)
        {
            self::$RouteMode = self::STATE_TAGS[0];
        }
        else
        {
            self::$RouteMode = self::$queryString[self::QUERY_MODE][0];
        }

        if(!Auth::Verify())
        {
            self::RedirectQuery('?' . $_SERVER['QUERY_STRING']);
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

    public static function RedirectQuery($queryString)
    {
        header("Status: 301 Moved Permanently");
        header("Location: /" . $queryString);
    }

    public static function PageActualUrl($option = null)
    {
        $currentLink = (isset($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
        . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($currentLink, '?') !== false)
        {
            $currentLink = substr($currentLink, 0, strpos($currentLink, '?') - strlen($currentLink));
        }
    }

    private function StartController()
    {
        Utils::viewLoader(self::$RouteMode);
        StartView::Render();
    }

    private function TrasferController()
    {
        // Check if from done state
        self::RedirectQuery('?' . Query::ModeSwitch('transfer'));
    }

    private function DoneController()
    {
        Utils::viewLoader(self::$RouteMode);
        DoneView::Render();

        if(Session::Status())
        {
            Stream::Transfer();
        }
        else
        {
            self::RedirectQuery('?' . Query::ModeSwitch('done'));
        }
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

        if(Session::Status())
        {
            self::RedirectQuery('?' . Query::ModeSwitch('auth'));
        }
        else if(!Auth::Verify())
        {
            self::RedirectQuery('?' . $_SERVER['QUERY_STRING']);
        }
        else if(!isset(Session::$SESSION_VALUE))
        {
            // self::RedirectQuery('?' . Query::ModeSwitch('error'));
        }
    }

}
