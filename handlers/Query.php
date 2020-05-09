<?php

class Query {

    public function __construct()
    { }

    public static function Filter()
    {
        $query  = explode('&', $_SERVER['QUERY_STRING']);
        $params = array();

        foreach( $query as $param )
        {
        // prevent notice on explode() if $param has no '='
        if (strpos($param, '=') === false) $param += '=';

        list($name, $value) = explode('=', $param, 2);
        $params[urldecode($name)][] = urldecode($value);
        }

        return $params;

    }

    public static function Session()
    { }
}