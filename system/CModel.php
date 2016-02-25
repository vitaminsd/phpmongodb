<?php
/**
* @author mqzhou <mqzhou@iflytek.com>
* @access 2016/02/24
* create CModel for config file Model
*/
class CModel {

    public $paths = array();
    
    public function __construct() {
        $this->paths = Config::$configpaths;
    }

    public function listPaths() {
        try {
            return $this->paths;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listFiles($path) {
        try {
            $handle = opendir($path);
            $array_file=array();
            while (false !== ($file=readdir($handle)))
            {
                if ($file != "." && $file != "..")
                {
                    $array_file[] = $path."/".$file;
                }
            }
            closedir($handle);
            return $array_file;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function listAllFiles() {
        try {
            $array_files = array();
            foreach($this->paths as $path) {
                $array_files[] = listFiles($path);
            }
            return $array_files;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>
