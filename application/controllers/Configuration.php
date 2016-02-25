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
    protected $cmodel = FALSE;

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

    public function Insert() {
        $this->isReadonly();
        $this->setDB();
        $this->setConfiguration();
        if (empty($this->db) || empty($this->Configuration)) {
            $this->gotoDatabse();
        }
        $this->application->view = 'Configuration';
        $data = array('isAjax' => $this->request->isAjax());
        $this->display('insert', $data);
    }

    public function Record() {
        print_r($this->cmodel);
        $this->path = $this->request->getParam("path", "./");
        $this->file = $this->request->getParam("file", "");
        $content = file_get_contents($this->path."/".$this->file);
        $this->application->view = 'Configuration';
        $this->display('record', $content);
    }

    public function EditRecord() {
        $this->isReadonly();
        $this->setDB();
        $this->setConfiguration();
        $id = $this->request->getParam('id');
        $idType = $this->request->getParam('id_type');
        $format = $this->request->getParam('format');
        $cryptography = new Cryptography();
        $cmodel = $this->getModel();
        if ($this->request->isPost()) {

            if ($this->request->getParam('format') == 'array') {
                $data = $cryptography->stringToArray($this->request->getParam('data'));
                if (is_array($data)) {
                    $response = $cmodel->updateById($this->db, $this->Configuration, $id, $data, 'array', $idType);
                } else {
                    $response['errmsg'] = I18n::t('INVALID_DATA');
                }
            } else if ($this->request->getParam('format') == 'json') {
                $response = $cmodel->updateById($this->db, $this->Configuration, $id, $this->request->getParam('data'), 'json', $idType);
            }
            if (isset($response['ok']) && $response['ok'] == 1) {
                $this->message->sucess = I18n::t('U_S');
            } else {
                $this->message->error = $response['errmsg'];
            }
        }

        if (!empty($this->db) && !empty($this->Configuration) && !empty($id) && !empty($idType)) {
            $cursor = $cmodel->findById($this->db, $this->Configuration, $id, $idType);
            if ($cursor) {
                unset($cursor['_id']);
                $record['json'] = $cryptography->arrayToJSON($cursor);
                $record['array'] = $cryptography->arrayToString($cursor);
                $this->application->view = 'Configuration';
                $this->display('edit', array('record' => $record, 'format' => $format, 'id' => $id));
            } else {
                $this->message->error = I18n::t('INVALID_ID');
            }
        } else {
            $this->url = "index.php";
            $this->request->redirect($this->url);
        }
    }

    public function DeleteRecord() {
        $this->isReadonly();
        $this->setDB();
        $this->setConfiguration();
        $id = $this->request->getParam('id');
        $idType = $this->request->getParam('id_type');
        if (!empty($this->db) && !empty($this->Configuration) && !empty($id)) {
            $response = $this->getModel()->removeById($this->db, $this->Configuration, $id, $idType);
            if ($response['n'] == 1 && $response['ok'] == 1) {
                $this->message->sucess = I18n::t('R_S_D');
            } else {
                $this->message->error = I18n::t('INVALID_ID');
            }
            $this->url = Theme::URL('Configuration/Record', array('db' => $this->db, 'Configuration' => $this->Configuration));
        } else {
            $this->url = "index.php";
        }
        $this->request->redirect($this->url);
    }

    public function SaveRecord() {

        $this->setDB();
        $this->setConfiguration();
        if ($this->validation($this->db, $this->Configuration)) {

            switch (strtolower($this->request->getParam('type'))) {
                case 'fieldvalue':
                    $a = array_combine($this->request->getParam('fields'), $this->request->getParam('values'));
                    $this->insertRecord($a);
                    break;
                case 'array':
                    $cryptography = new Cryptography();
                    $a = $cryptography->stringToArray($this->request->getParam('data'));
                    $this->insertRecord($a);
                    break;
                case 'json':
                    $response = $this->getModel()->insert($this->db, $this->Configuration, $this->request->getParam('data'), 'json');
                    if ($response['ok'] == 1) {
                        $this->message->sucess = I18n::t('R_I');
                    } else {
                        $this->message->error = I18n::t('I_J');
                    }
                    break;
            }
        }
        $this->request->redirect(Theme::URL('Configuration/Record', array('db' => $this->db, 'Configuration' => $this->Configuration)));
    }

    private function insertRecord($a) {
        unset($a['']);
        if (count($a) > 0) {
            $this->message->sucess = count($a) . I18n::t('R_I');
            $this->getModel()->insert($this->db, $this->Configuration, $a);
        } else {
            $this->message->error = I18n::t('E_F_N_A_V');
        }
    }

    private function validation($db = NULL, $configuration = NULL) {
        if (!$this->isValidDB($db)) {
            return false;
        }
        if (!$this->isValidConfiguration($configuration)) {
            return false;
        }
        return true;
    }

    private function isValidDB($db = NULL) {
        if (empty($db) || !isset($db) || !$this->isValidName($db)) {
            $this->message->error = I18n::t('I_D_N');
            $this->setURL('db');
            return false;
        }
        return true;
    }

    private function isValidConfiguration($configuration = NULL) {
        if (empty($configuration) || !isset($configuration)) {
            $this->message->error = I18n::t('E_C_N');
            $this->setURL('Configuration');
            return false;
        } else if (!$this->isValidName($configuration)) {
            $this->message->error = I18n::t('Y_C_N_U_C_F_C_N');
            $this->setURL('Configuration');
            return false;
        } else {
            return true;
        }
    }

    private function setURL($type = NULL) {
        switch ($type) {
            case 'db':
            case 'database':
                $this->url = Theme::URL('Database/Indexes');
                break;
            case 'Configuration':
                $this->url = (empty($this->db) ? Theme::URL('Database/Indexes') : Theme::URL('Configuration/Index', array('db' => $this->db)));
                break;
            default :
                $this->url = "index.php";
                break;
        }
    }

    public function CreateConfiguration() {
        $this->setDB();
        if (!empty($this->db)) {
            $this->setConfiguration();
            $capped = $this->request->getPost('capped', FALSE);
            $size = $this->request->getPost('size', 0);
            $max = $this->request->getPost('max', 0);

            if (!empty($this->Configuration)) {
                $this->getModel()->createConfiguration($this->db, $this->Configuration, $capped, $size, $max);
                $this->message->sucess = I18n::t('C_C', $this->Configuration);
            } else {
                $this->message->error = I18n::t('E_C_N');
            }
            $this->url = Theme::URL('Configuration/Index', array('db' => $this->db));
        }
        $this->request->redirect($this->url);
    }

    public function RenameConfiguration() {
        $this->setDB();
        $this->setConfiguration();
        $oldConfiguration = urldecode($this->request->getParam('old_Configuration'));
        if ($this->validation($this->db, $this->Configuration)) {
            if ($this->isValidConfiguration($oldConfiguration)) {
                $response = $this->getModel()->renameConfiguration($this->Configuration, $oldConfiguration, $this->db);
                if ($response['ok'] == '1') {
                    $this->message->sucess = I18n::t('C_R_S');
                } else {
                    $this->message->error = $response['errmsg'];
                }
                $this->url = Theme::URL('Configuration/Index', array('db' => $this->db));
            }
        }
        $this->request->redirect($this->url);
    }

    public function DropConfiguration() {
        $this->setDB();
        $this->setConfiguration();
        if ($this->validation($this->db, $this->Configuration)) {
            $response = $this->getModel()->dropConfiguration($this->db, $this->Configuration);
            if ($response['ok'] == '1') {
                $this->message->sucess = I18n::t('C_D', $this->Configuration);
            } else {
                $this->message->error = $response['errmsg'];
            }
            $this->url = Theme::URL('Configuration/Index', array('db' => $this->db));
        }
        $this->request->redirect($this->url);
    }

    public function Remove() {
        $this->isReadonly();
        $this->setDB();
        $this->setConfiguration();
        if ($this->validation($this->db, $this->Configuration)) {
            $response = $this->getModel()->removeConfiguration($this->db, $this->Configuration);
            $this->message->sucess = I18n::t('C_R', $this->Configuration);
            $this->url = Theme::URL('Configuration/Index', array('db' => $this->db));
        }
        $this->request->redirect($this->url);
    }

    protected function quickExport() {
        $cursor = $this->getModel()->find($this->db, $this->Configuration);
        $file = new File(sys_get_temp_dir(), $this->Configuration . '.json');
        $file->delete();
        $cryptography = new Cryptography();
        while ($cursor->hasNext()) {
            $document = $cursor->getNext();
            $json = $cryptography->arrayToJSON($document);
            $json = str_replace(array("\n", "\t"), '', $json);
            $file->write($json . "\n");
        }
        if ($file->success) {
            $file->download();
        } else {
            $this->message->error = $file->message;
        }
    }

    protected function customExport() {
        $fields = array();
        $query = array();
        $limit = $this->request->getParam('limit');
        $skip = $this->request->getParam('skip');
        $limit = empty($limit) ? false : $limit;
        $skip = empty($skip) ? false : $skip;
        $path = sys_get_temp_dir();
        $fileName = $this->request->getParam('file_name');
        $fileName = (empty($fileName) ? $this->Configuration : $fileName) . '.json';
        $cursor = $this->getModel()->find($this->db, $this->Configuration, $query, $fields, $limit, $skip);
        $file = new File($path, $fileName);
        $file->delete();
        $cryptography = new Cryptography();
        while ($cursor->hasNext()) {
            $document = $cursor->getNext();
            $file->write($cryptography->arrayToJSON($document) . "\n");
        }
        if ($this->request->getParam('text_or_save') == 'save') {
            if ($file->success) {
                if ($this->request->getParam('compression') == 'none') {
                    $file->download();
                } else {
                    $compressFile = $this->createCompress($fileName, $file);
                    if ($compressFile) {
                        $file->download($compressFile);
                    } else {
                        $this->message->error = $file->message;
                        return false;
                    }
                }
            } else {
                $this->message->error = $file->message;
                return false;
            }
        } else {
            return file_get_contents($path . $fileName);
        }
    }

    protected function createCompress($fileName, File $file) {
        if ($this->request->getParam('compression') == 'zip') {
            $response = $file->createZip(array($fileName), $this->Configuration . '.zip', TRUE);
            if ($response) {
                return $this->Configuration . '.zip';
            } else {
                return false;
            }
        }
    }

    public function Export() {
        $this->setDB();
        $this->setConfiguration();
        $record = false;
        if ($this->request->isPost()) {
            switch ($this->request->getParam('quick_or_custom')) {
                case 'quick':
                    $this->quickExport();
                    break;
                case 'custom':
                    $record = $this->customExport();
                    break;
            }
        }
        if (!empty($this->db) || !empty($this->Configuration)) {
            $this->application->view = 'Configuration';
            $this->display('export', array('record' => $record));
        } else {
            $this->gotoDatabse();
        }
    }

    public function Import() {
        $this->isReadonly();
        $this->setDB();
        $this->setConfiguration();
        if ($this->request->isPost()) {
            if ($_FILES['import_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['import_file']['tmp_name'])) { //checks that file is uploaded
                $handle = @fopen($_FILES['import_file']['tmp_name'], "r");
                if ($handle) {
                    while (($record = fgets($handle)) !== false) {
                        $response = $this->getModel()->insert($this->db, $this->Configuration, $record, 'json');
                        if ($response['ok'] == 1) {
                            $this->message->sucess = I18n::t('A_D_I_S');
                        } else {
                            $this->message->error = $response['errmsg'];
                        }
                    }
                    if (!feof($handle)) {
                        $this->message->error = I18n::t('E_U_F');
                    }
                    fclose($handle);
                }
            }
        }
        $this->application->view = 'Configuration';
        $this->display('import');
    }

    public function Search() {
        $this->setDB();
        $this->setConfiguration();
        $this->display('search');
    }

    /**
     * @author Nanhe Kumar <nanhe.kumar@gmail.com>
     * @access protected
     */
    protected function gotoDatabse() {
        $this->request->redirect(Theme::URL('Database/Index'));
    }

}
