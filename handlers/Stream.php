<?php

final class Stream {

    public function __construct()
    { }

    public static function Transfer()
    {

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
                die();
            } else {
                http_response_code(404);
                die();
            }
        } else {
            die("Invalid file name!");
        }
    }
}
