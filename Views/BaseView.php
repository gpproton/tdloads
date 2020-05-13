<?php

class BaseView {

    protected static function Header()
    {
        return <<<EOF

        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <meta name="HandheldFriendly" content="true">
                <!-- Load icon library -->
                <link rel="stylesheet" href="/libs/style/main.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <title>TDLOADS</title>
            </head>
            <body>
        
        
    
EOF;
    }

    protected static function Footer()
    {
        return <<<EOF

        </body>
        </html>

EOF;
    }

    public static function Render()
    {
        echo self::Header();

        echo static::Content();

        echo self::Footer();
    }

}