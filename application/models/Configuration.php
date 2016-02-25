<?php

defined('PMDDA') or die('Restricted access');
/*
 * Model
 */

class Configuration extends CModel {

    public function createConfiguration() {
        try {
/*             $options=array('capped' => $capped,'size' =>$size,'max' =>$max);
            $this->mongo->{$db}->createConfiguration($configuration,$options);
            if (!$capped) {
                $this->mongo->{$db}->selectConfiguration($configuration)->ensureIndex(array("_id" => 1));
            } */
            return TRUE;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    public function removeConfiguration() {
        try {
            return TRUE;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}

//End of class