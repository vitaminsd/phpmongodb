<?php

defined('PMDDA') or die('Restricted access');
/*
 * Configuration model, write method here
 */

class Datatable extends TModel {
    public function import($type, $filename) {
        try {
            // import CSV file to database
            return $filename;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
    
    public function search($type, $src) {
        try {
            $result = array();
            $handle = @fopen(Theme::getHome()."/test.json", "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $result[] = $line;
                }
                fclose($handle);
            }
            return $result;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}

//End of class