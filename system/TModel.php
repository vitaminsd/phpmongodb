<?php
/**
* @author mqzhou <mqzhou@iflytek.com>
* @access 2016/02/24
* create TModel for tool Model
*/
class TModel {

    public $tools = array();

    public function __construct() {
        $this->tools = Config::$tools;
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
                    $fileext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (is_file($filename) && in_array($fileext, $this->ext))
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
