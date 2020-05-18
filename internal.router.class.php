<?php
# # Used by router class to change HTTP status # #
namespace router_;
class Router_ {


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
           throw new Exception($e);
        }
    }


    /**
      * Sets the content type to json.
      *
      * @author  Rageous0
      *
      * @return  The content type for json - application/json.
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
      * Sets the content type to xml.
      *
      * @author  Rageous0
      *
      * @return  The content type for xml - application/xml.
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


    // List of HTTP status codes supported, used by the status and redirect functions.
	private const REDIRECT_STATUSES = array(301, 302);

}
?>