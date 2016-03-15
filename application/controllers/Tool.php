<?php

/**
* @author mqzhou <mqzhou@iflytek.com>
* @access 2016/02/24
*/
defined('PMDDA') or die('Restricted access');
/*
 * Controller
 */

class ToolController extends Controller {
    protected $url = NULL;
    protected $model = NULL;
    protected $toolfunc = NULL;

    public function getModel() {
        if (!($this->model instanceof Tool)) {
            return $this->model = new Tool();
        } else {
            return $this->model;
        }
    }

    public function setTool() {
        $this->toolfunc = urldecode($this->request->getParam('tool'));
    }

    public function Index() {
        $this->setTool();
        $this->getModel();
        $this->application->view = 'Tool';
        $this->display('index');
    }
    
    public function Execute() {
        $this->setTool();
        $this->getModel();
        $type = urldecode($this->request->getParam('type'));
        $para = urldecode($this->request->getParam('para'));
        $this->application->view = 'Tool';
        $this->display('index', $type, $para);
    }
}
