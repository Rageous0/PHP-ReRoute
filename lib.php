<?php
# # The main library file for PHP-ReRoute to load all scripts and library files # #
$php_v = PHP_VERSION !== null ? PHP_VERSION : phpversion();
if(version_compare($php_v, "7.1.0", "<")) {
    throw new Exception("Your current PHP version is unsupported. You need to run PHP 7.1.0 at least to run PHP-ReRoute. Support for older PHP versions may be added in the future.");
} else {
    set_include_path(__DIR__.DIRECTORY_SEPARATOR);
    foreach(glob(__DIR__.DIRECTORY_SEPARATOR."*.class.php") as $script) {
        require($script);
    }
    set_include_path(__DIR__.DIRECTORY_SEPARATOR."public");
    foreach(glob(__DIR__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."*.php") as $script) {
        require($script);
    }
}
?>