<?php
# # Used by router class to change data of the page. # #
namespace router_;
class Router_ {

    # HTTP status. [1]


    /**
      * Sets the HTTP status code.
      *
      * @author      Rageous0
      *
      * @param http  The HTTP status code for the page. 200 is default and is not necessary.
      * @return      Sets the HTTP status.
      */

    public function status($http) {
        if(!in_array(intval($http), self::STATUSES)) throw new Exception('The HTTP status code is not supported or valid, for a list of supported HTTP status codes check the STATUSES constant. You can also use the native http_response_code function if you need to.');
        http_response_code($http);
        return $this;
    }


    /**
      * Redirects the user on request, cannot process more code after execution.
      *
      * @author      Rageous0
      *
      * @param http  The HTTP status code for the page. 200 is default and is not necessary.
      * @param url   The URL to redirect to on request.
      * @return      Renders data from the callback function.
      */

    public function redirect($url, $http=301) {
        if(gettype($url) !== 'string') throw new Exception('Cannot resolve $url to type of string.');
        if(gettype($http) !== 'string' and gettype($http) !== 'integer') throw new Exception('Cannot resolve $http to the type of string or integer.');
        if(!in_array(intval($http), self::REDIRECT_STATUSES)) throw new Exception('Invalid HTTP status for redirection, valid statuses for redirection are 301 and 302.');
        if(!preg_match('/((http(s)?:\/\/)?(([\w\d]+)\.([A-Z])))/i', $url)) throw new Exception('Invalid URL form. Valid URL form requires http://, https:// or no scheme. And needs to be in the same format as example.com.');
        try {
            if($http == 301) header("HTTP/1.1 301 Moved Permanently");
            if($http == 302) header("HTTP/1.0 302 Noved temporarily");
            header("location: ${url}");
            exit;
        } catch(Exception $e) {
            return false;
        }
    }



    # Content-type management. [2]


    /**
      * Sets the content type to JSON.
      *
      * @author  Rageous0
      *
      * @return  The content type for JSON - application/json.
      */

    public function json() {
        try {
            header('Content-Type: application/json');
            return true;
        } catch(Exception $e) {
            return false;
        }
    }


    /**
      * Sets the content type to XML.
      *
      * @author  Rageous0
      *
      * @return  The content type for XML - application/xml.
      */

    public function xml() {
        try {
            header('Content-Type: application/xml');
            return true;
        } catch(Exception $e) {
            return false;
        }
    }


    /**
      * Sets the content type to plaintext.
      *
      * @author  Rageous0
      *
      * @return  The content type for plaintext - text/plain.
      */

    public function plain() {
        try {
            header('Content-Type: text/plain');
            return true;
        } catch(Exception $e) {
            return false;
        }
    }



    # Router_ constants. [3]


    // List of HTTP status codes supported, used by the status and redirect functions.
    private const STATUSES = array(100, 101, 102, 103, 200, 201, 202, 203, 204, 205, 206, 300, 301, 302, 303, 304, 305, 306, 307, 308, 400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 422, 423, 424, 425, 426, 449, 450, 500, 501, 502, 503, 504, 505, 506, 507, 508, 509);  
    private const REDIRECT_STATUSES = array(301, 302);

}
?>