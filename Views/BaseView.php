<?php

class BaseView {

    public static function Header()
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

    public static function Footer()
    {
        return <<<EOF

        </body>
        </html>

EOF;
    }

    public static function Content()
    {
        return <<<EOF

        <h1>Test Auth</h1>
        <!-- The form -->
        <form class="example" action="">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        
EOF;
    }

    public static function Render()
    {
        echo self::Header();

        echo self::Content();

        echo self::Footer();
    }

}