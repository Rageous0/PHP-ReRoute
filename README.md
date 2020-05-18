# PHP-ReRoute
Simple routing module for PHP.

### What can it do?
PHP-ReRoute can be used to route different section of your website.
This may sound complex but isn't really, the most complex part is possibly the fact that you need some server-side configuration.
How the configuration should work is simply by instructing your server to send the script handling routing and maybe possible 404 errors too.

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
    Instructs the endpoint to use the GET method, default in browsers.
    Sets content type to text/plain (plaintext).
    Echoes 'Hello world!' and prints it on screen.
*/ 
$router->request('/', 'GET', function($res, $req) {
    
    // Redirecting.
    // $res->redirect($url, $http);
    
    $res->plain();
    
    // Other content types supported.
    // $res->json();
    // $res->xml();
    
    echo 'Hello World!';
});
```

### New in 1.0.0?
• Removed status function, due to http_status_code existing.

• Modified README.md.

• Removed templates due to being useless.

