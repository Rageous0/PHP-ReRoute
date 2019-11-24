<?php
# # View, used for rendering and similar. # #

class View {

    # File / site rendering management. [1]


    /**
      * Renders the content of a website (by URL) or file (by path).
      *
      * @author Rageous0
      *
      * @param fp   The filepath or url you want to render the contents of.
      * @param web  If the specified data in param fp is a website or not.
      * @return     The contents of the specified url or filepath.
      */

    public function __construct($fp, $web=false) {
        if(gettype($fp) != 'string') throw new Exception('Cannot resolve $fp to the type of string.');
        if(gettype($web) != 'boolean') throw new Exception('Cannot resolve $web to the type of boolean.');

        if(!$web) {
            if(!file_exists($fp)) throw new Exception('Cannot locate the file provided to be located at'.$fp.'.');
            echo file_get_contents($fp);
            return true;
        } else {
            $headers = @get_headers($fp);
            if(!$headers or $headers[0] == 'HTTP/1.1 404 Not Found') {
                set_include_path(self::TEMPLATE_DIR);
                require_once(self::TEMPLATE_FILE);
                new template\Template('404_webview.reroute');
                return false;
            } else {
                echo file_get_contents($fp);
                return true;
            }
        }
    }



    # View constants. [2]


    // Templates path, used to render PHP-ReRoute template files.
    private const TEMPLATE_DIR =  __DIR__.DIRECTORY_SEPARATOR;
    private const TEMPLATE_FILE = 'template.class.php';

}
?>