<?php
# # Template loader utility class. # #

namespace template;
class Template {

    # Template handling utility. [1]


    /**
      * Loads a PHP-ReRoute template file.
      *
      * @author    Rageous0
      *
      * @param fp  The path to load as template.
      * @return    Renders data from the callback function.
      */

    public function __construct($fp) {
        if(!file_exists(__DIR__.DIRECTORY_SEPARATOR."templates".DIRECTORY_SEPARATOR.$fp)) throw new Exception('Template file '.__DIR__.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$fp.' could not be located.');  
        if(pathinfo(__DIR__.DIRECTORY_SEPARATOR."templates".DIRECTORY_SEPARATOR.$fp, PATHINFO_EXTENSION) !== 'reroute') throw new Exception('Invalid extension for PHP-ReRoute template files.');
        $data = file_get_contents(__DIR__.DIRECTORY_SEPARATOR."templates".DIRECTORY_SEPARATOR.$fp);
        if(!$this->startsWith($data, '##template')) throw new Exception('Missing template file meta.');
        $data = preg_replace('/##template/', '', $data);
        echo $this->replaceConsts($data);
    }


    /**
      * Checks if PHP-ReRoute includes meta at the start of the file.
      *
      * @author      Rageous0
      *
      * @param str   The string to check with.
      * @param sstr  The string (needle) to check for.
      * @return      Boolean based on if the conditions are valid.
      */

    private function startsWith($str, $sstr) {
        $len = strlen($sstr);
        if(substr($str, 0, $len) === $sstr) return true;
        return false;
    }


    /**
      * Uses the PHP-ReRoute template constants.
      *
      * @author     Rageous0
      *
      * @param dat  The string to check with.
      * @return     Boolean based on if the conditions are valid.
      */

    private function replaceConsts($data) {
        $data = str_replace('<%=url%>', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $data);
        return $data;
    }

}
?>