<?php

/**
* @author mqzhou <mqzhou@iflytek.com>
* @access 2016/02/24
*/
defined('PMDDA') or die('Restricted access');
/*
 * Controller
 */

class ConfigurationController extends Controller {

    protected $path = NULL;
    protected $file = NULL;
    protected $configuration = NULL;
    protected $url = NULL;
    protected $cmodel = NULL;

    public function getModel() {
        if (!($this->cmodel instanceof Configuration)) {
            return $this->cmodel = new Configuration();
        } else {
            return $this->cmodel;
        }
    }

    public function setPath() {
        $this->path = urldecode($this->request->getParam('path'));
    }
    
    public function setFile() {
        $this->file = urldecode($this->request->getParam('file'));
    }

    public function setConfiguration() {
        $this->Configuration = urldecode($this->request->getParam('Configuration'));
    }
    
    public function ListPaths() {
        $this->getModel();
        $pathInfo = $this->cmodel->listFolder(Config::$configpaths);
        $this->display('list', $pathInfo);
    }
    
    public function Index() {
        $this->setPath();
        $this->getModel();
        $this->file = $this->cmodel->listFiles($this->path);
        $this->setConfiguration();
        $this->application->view = 'Configuration';
        $this->display('index', $this->path, $this->file);
    }

    public function Record() {
        $this->setPath();
        $this->setFile();
        $this->setConfiguration();
        $content = file_get_contents($this->file);
        $this->application->view = 'Configuration';
        $this->display('record', $content);
    }

    public function EditRecord() {
        $this->isReadonly();
        $this->setFile();
        $data = $this->request->getParam('data');
        $cmodel = $this->getModel();

        if ($cmodel->updateDate($this->file, $data)) {
            $this->request->redirect(Theme::URL('Configuration/Record', array('file' => $this->file)));
        } else {
            $this->url = "index.php";
            $this->request->redirect($this->url);
        }
    }
}
