<?php

defined('PMDDA') or die('Restricted access');
/*
 * Configuration model, write method here
 */

class Configuration extends CModel {
    public function updateDate($path, $file, $data) {
        try {
            $file = fopen($path."/".$file, "w");
            fwrite($file, $data);
            fclose($file);
            return TRUE;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}

//End of class