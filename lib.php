<?php
# # The main library file for PHP-ReRoute to load all scripts etc. # #
$php_v = PHP_VERSION !== null ? PHP_VERSION : phpversion();
if(version_compare($php_v, "7.1.0", "<")) {
    throw new Error("Your current PHP is unsupported. You need to run PHP 7.1.0 at least to run PHP-ReRoute. Support for other PHP versions may be added in the future.");
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