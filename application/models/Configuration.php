<?php

defined('PMDDA') or die('Restricted access');
/*
 * Configuration model, write method here
 */

class Configuration extends CModel {
    public function updateDate($file, $data) {
        try {
            // update when data change
            $ori_data = file_get_contents($file);
            if ($ori_data == $data) {
                return TRUE;
            } else {
                $file = fopen($file, "w");
                fwrite($file, $data);
                fclose($file);
                return TRUE;
            }
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}

//End of class