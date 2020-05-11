<?php

class Stream {
    
    private static $HelpersUtils = 'Helpers_Utils';

    public function __construct()
    {
        Injector::loadClass(self::$HelpersUtils);
    }

    public static function Transfer()
    {
        Injector::loadClass(self::$HelpersUtils);

        if(Utils::urlIllegalCheckr(Path::$filePath)){
            $filepath = Path::$filePath;
            $filename = basename($filepath);
            $filesize = filesize($filepath);

            // Process download
            if(file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: ' . Utils::mimeType($filename));
                header('Content-Disposition: attachment; filename="'. $filename .'"');
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . $filesize);
                
                ob_clean();
                flush();
                readfile($filepath);
                // header("Location: /");
                die();
            } else {
                http_response_code(404);
                die();
            }
        } else {
            die("Invalid file name!");
        }
        echo 'Placeholder...';
    }
}
