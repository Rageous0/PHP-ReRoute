<?php
# # Request classes # #
class Router {

    /**
      * Handles a users request using the GET request method.
      *
      * @author     Rageous0
      *
      * @param url  The URL to use when requesting page, e.g '/' for homepage.
      * @param cb   Callback function where the data to render goes.
      * @return     Renders data from the callback function.
      */

    public function request($url, $method=null, $cb=null) {
        if(gettype($url) !== 'string') throw new Exception('Cannot resolve $url to the type of string.');
        if(gettype($method) !== 'string') throw new Exception('Cannot resolve $method as a callback function.');
        if(gettype($cb) !== 'object') throw new Exception('Cannot resolve $cb as a callback function.');

        $url = strtolower($url);
        $method = strtoupper($method);

        $req = trim(@explode('/', $_SERVER['REQUEST_URI'])[1]);
        $req = @explode('?', $req)[0];
        $req = @explode('#', $req)[0];
        $req = "/{$req}";

        $res = null;
        if($method === 'POST') $res = $_POST;
        if($method === 'GET') $res = $_GET;
        if($method === 'PUT') $res = $_PUT;
        if($method === 'DELETE') $res = $_DELETE;
        if($res === null) throw new Exception('Invalid or unsupported method specified.');

        if(trim($url) !== '*' and trim($req) === trim($url)) {
            if(strtoupper($_SERVER['REQUEST_METHOD']) !== $method) {
                @header('Content-Type: text/html');
                @http_response_code(405);
                echo 'Cannot <b>'.strtoupper($_SERVER['REQUEST_METHOD']).'</b> '.$_SERVER['REQUEST_URI'];
                exit;
            }
            @set_include_path(__DIR__.DIRECTORY_SEPARATOR.'internal.router.class.php');
            @$cb(new router_\Router_(), json_encode(array('params' => $res, 'server' => $_SERVER)));
            exit;
        } elseif(trim($url) === '*' and trim($url) !== trim($req)) {
            @http_response_code(404);
            @$cb(new router_\Router_(), json_encode(array('params' => $res, 'server' => $_SERVER)));
            exit;
        }
    }


}
?>