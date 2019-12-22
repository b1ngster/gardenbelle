<?php

class Logger {

    /** Logger logs conents to file */

    public static function write( $file, $contents  ){

        
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/logs';
        $path = $dir .DIRECTORY_SEPARATOR . $file;
       /*adds a line to the log file */
            if(file_put_contents( 
                $path, $contents. PHP_EOL, FILE_APPEND))
                return true;
    }
    
   

}