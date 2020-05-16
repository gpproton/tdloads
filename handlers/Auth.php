<?php

final class Auth {

    const CONFIG_HANDLER = 'Handlers_Config';
    const SESSION_HANDLER = 'Handlers_Session';
    const QUERY_HANDLER = 'Handlers_Query';

    public function __construct()
    { }

    public static function Verify()
    {
        Injector::loadClass(self::CONFIG_HANDLER);
        Injector::loadClass(self::SESSION_HANDLER);
        Injector::loadClass(self::QUERY_HANDLER);

        Config::Load();
        Session::Boot();

        Session::$SESSION_VALUE = Query::PostData('dl_passkey');

        if(isset(Session::$SESSION_VALUE) && Session::$SESSION_VALUE !== self::Key())
        {
            return false;
        }
        else if(!Session::Status() && Session::$SESSION_VALUE=== self::Key())
        {
            Session::Setup();
            return Session::Status();
        }
        else
        {
            return true;
        }
    }

    private function Key()
    {
        switch(Config::$AUTH_TYPE)
        {
            case 'passkey':
                return self::PassKey();
            case 'database':
                return self::Database();
            case 'auth0':
                return self::Auth0();
            default:
                return '';
        }
    }

    // Auth JWT auth sources
    private function PassKey()
    {
        return Config::$PASS_KEY;
    }

    private function Database()
    {
        return '';
    }

    private function Auth0()
    {
        return '';
    }

}