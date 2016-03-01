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

    public function listFolder($paths) {
        try {
            $array_paths=array();
            foreach($paths as $path) {
                $array_paths[] = $this->getFileProperty($path);
            }
            return $array_paths;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function listFiles($path) {
        try {
            $array_file=array();
            if (is_file($path)) {
                $array_file[] = $this->getFileProperty($path);
            } else if (is_dir($path)) {
                $handle = opendir($path);
                while (false !== ($file=readdir($handle)))
                {
                    $filename = $path."/".$file;
                    if (is_file($filename))
                    {
                        $array_file[] = $this->getFileProperty($filename);
                    }
                }
                closedir($handle);
            }
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

    private function getFileProperty($filename) {
        return array("name"=>$filename, "size"=>filesize($filename), "mtime"=>filemtime($filename));
    }
}

?>
