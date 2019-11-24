# PHP-ReRoute
Simple routing module for PHP.

### What can it do?
PHP-ReRoute can be used to route different section of your website.
This may sound complex but isn't really, the most complex part is possibly the fact that you need some server-side configuration.
How the configuration should work is simply by instructing your server to send the script handling routing and maybe possible 404 errors too.
E.g /data will show the contents of / but get the request URI which is "/data" and match it in the routing.

### Basic example of a "Hello World" site.
##### /index.php
```php
<?php
// Load the library files and modules.
set_include_path(_DIR_ . '/PHP-ReRoute');
require('lib.php');

// Define a router.
$router = new Router();

/*
  Loads root and forces the pages request method to be GET - valid/supported request methods are GET, POST, PUT, DELETE.
  GET should always be used if the page will be loaded in browser by normal means and not for purposes such as an API.
  This due to browser GETting the website.
  
  Sets status to 200 - not required as it is set, but only for the examples sake.
  After setting the status it sets the content type to 'text/plain'.
  
  Finally it renders and displays 'Hello World!'
*/ 
$router->request('/', 'GET', function($res, $req) {
    $res->status(200)->plain();
    echo 'Hello World!';
});
```

### Having issues?
Make sure to share them so we can short it out!
And maybe push out an update if needed.
