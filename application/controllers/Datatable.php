<?php

/**
* @author mqzhou <mqzhou@iflytek.com>
* @access 2016/02/24
*/
defined('PMDDA') or die('Restricted access');
/*
 * Controller
 */

class DatatableController extends Controller {
    protected $url = NULL;
    protected $model = NULL;
    protected $table = NULL;

    public function getModel() {
        if (!($this->model instanceof Datatable)) {
            return $this->model = new Datatable();
        } else {
            return $this->model;
        }
    }

    public function setDatatable() {
        $this->table = urldecode($this->request->getParam('table'));
    }

    public function Index() {
        $this->setDatatable();
        $this->application->view = 'Datatable';
        $this->display('index');
    }
    
    public function Record() {
        $this->setDatatable();
        $this->application->view = 'Datatable';
        $this->display('record');
    }
    
    public function Import() {
        $this->setDatatable();
        $type = urldecode($this->request->getParam('type'));
        $verify = urldecode($this->request->getParam('verify'));
        $editor = urldecode($this->request->getParam('editor'));
        $editinfo = urldecode($this->request->getParam('editinfo'));

        if ($this->request->isPost()) {
            if ($_FILES['infile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['infile']['tmp_name'])) { //checks that file is uploaded
                // pass the import file, return log file
                $logfile = $this->getModel()->import($type, $_FILES['infile']['tmp_name']);
                $loginfo = file_get_contents($logfile);
                $this->message->success = I18n::t('A_D_I_S');
            }
        }
        $this->application->view = 'Datatable';
        $this->display('record', array('editor'=>$editor, 'editinfo'=>$editinfo, 'loginfo'=>$loginfo));
    }
    
    public function Search() {
        $this->setDatatable();
        $type = urldecode($this->request->getParam('type'));
        $src = urldecode($this->request->getParam('src'));
        $result = $this->getModel()->search($type, $src);
        $this->application->view = 'Datatable';
        $this->display('record', array('tab'=>"Search", 'src'=>$src, 'result'=>$result));
    }
    
    public function Modify() {
        $this->setDatatable();
        $type = urldecode($this->request->getParam('type'));
        $src = urldecode($this->request->getParam('src'));
        $ids = $this->request->getParam('ids');
        $result = $this->getModel()->search($type, $src);
        $this->application->view = 'Datatable';
        $this->display('record', array('tab'=>"Search", 'src'=>$src, 'result'=>$result, 'loginfo'=>"log info"));
    }
    
    public function Export() {
        $this->setDatatable();
        $file = new File(getcwd(), "/test.json");
        $file->download();
    }
    
    public function Execute() {
        $this->setDatatable();
        $this->getModel();
        $type = urldecode($this->request->getParam('type'));
        $para = urldecode($this->request->getParam('para'));
        $this->application->view = 'Datatable';
        $this->display('index', $type, $para);
    }
}
