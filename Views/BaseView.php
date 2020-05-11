<?php

class BaseView {

    public static function Header()
    {
        return <<<EOF

        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
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

        <h1>My First Heading</h1>
        <p>My first paragraph.</p>
        
EOF;
    }

    public static function Render()
    {
        echo self::Header();

        echo self::Content();

        echo self::Footer();
    }

}