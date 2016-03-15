<?php

/**
 * @author Nanhe Kumar <nanhe.kumar@gmail.com>
 * @version 1.0.0
 * @package PHPMongoDB
 */

class Config {

    public static $theme = 'default';
    public static $autocomplete=false;
    public static $language = array(
        'english' => 'English',
        'german' => 'German',
    );
    public static $server=array(
        'name' => "Localhost",
        'server'=>false,
        'host' => "127.0.0.1",
        'port'=>"27017",
        'timeout'=>0,
    );
    public static $dbmanager = array(
        'all' => false,
        'databases' => array(
            "test",
            "xxx"
        )
    );
    public static $authentication = array(
        'authentication'=>false,
        'user' => 'admin',
        // md5 password
        'password' => '21232f297a57a5a743894a0e4a801fc3'
    );
    public static $authorization = array(
        'readonly'=>false,
    );
    public static $configpaths = array(
        'paths' => array(
            "D:/xampp/htdocs/mqzhou/zzz",
            "D:/xampp/htdocs/mqzhou/yyy/",
            "D:/xampp/htdocs/mqzhou/trunk",
            "D:/xampp/htdocs/mqzhou/yyy/fss.cfg"
            ),
        // file filter
        'ext' => array(
            'cfg',
            'cfu',
            ''
        )
    );
    // function name => bash file path
    public static $tools = array(
        '前处理' => 'bashfile1',
        '后处理' => 'bashfile2'
    );
    /**
     *
     * @var array
     * @link http://in2.php.net/manual/en/mongoclient.construct.php (for more detail)
     */
    public static $connection = array(
        'server' => "", //mongodb://localhost:27017
        'options' => array(
            'replicaSet' => false,
        ), //
    );

}

?>
