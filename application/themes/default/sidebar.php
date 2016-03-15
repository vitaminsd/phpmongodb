<?php defined('PMDDA') or die('Restricted access'); ?>
<div class="sidebar-nav" id="left">
    <p class="main-header"><a href="<?php echo Theme::URL('Datatable/Index'); ?>">数据库</p>
    <a href="<?php echo Theme::URL('Datatable/Record', array('table'=>'sentence')); ?>" class="nav-header" >
        <span class="glyphicon glyphicon-floppy-disk"></span>句库
    </a>
    <a href="<?php echo Theme::URL('Datatable/Record', array('table'=>'word')); ?>" class="nav-header" >
        <span class="glyphicon glyphicon-floppy-disk"></span>词库
    </a>

    <?php
    $chttp=new Chttp();
    $dbList = Widget::get('DBList');
    
    $confModel = new Configuration;
    $pathList = $confModel->paths;
    
    $tModel=new Tool;
    $tools = $tModel->tools;

    if (is_array($dbList['databases'])) {
    ?><p class="main-header"><a href="<?php echo Theme::URL('Database/Index'); ?>"><?php I18n::p('DB'); ?></a></p>
    <?php
        $dbName = $chttp->getParam('db');
        if (empty($dbName)) {
    ?>
            <ul  class="nav nav-list collapse in">
                <?php
                foreach ($dbList['databases'] as $db) {
                    ?>
                    <a href="<?php echo Theme::URL('Collection/Index', array('db' => $db['name'])); ?>" class="nav-header" >
                        <span class="glyphicon glyphicon-floppy-disk"></span><?php echo $db['name']; ?><span class="label label-info"><?php echo !empty($db['noOfCollecton'])?$db['noOfCollecton']:'';?></span>
                    </a>
                <?php } ?>


            </ul>
            <?php
        } else {
            foreach ($dbList['databases'] as $db) {
                if ($dbName == $db['name']) {
                    $collectionList = Widget::get('CollectonList');
                    ?>
                    <a href="#accounts-menu" class="nav-header" data-toggle="collapse">
                        <span class="glyphicon glyphicon-floppy-disk"></span><?php echo $db['name']; ?><span class="label label-info"><?php echo $db['noOfCollecton'];?></span>
                    </a>
                    <?php 
                    if ($collectionList) { 
                        
                        ?>
                        <ul id="accounts-menu" class="nav nav-list collapse in">
                            <?php foreach ($collectionList as $collection) {?>
                            <li ><a href="<?php echo Theme::URL('Collection/Record', array('db' => $db['name'], 'collection' => $collection['name'])); ?>"><span class="glyphicon glyphicon-list"></span><?php echo $collection['name'],' ('.$collection['count'],')'; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php
                        
                    }
                } else {
                    ?>
                    <a href="<?php echo Theme::URL('Collection/Index', array('db' => $db['name'])); ?>" class="nav-header" >
                        <span class="glyphicon glyphicon-floppy-disk"></span><?php echo $db['name']; ?><span class="label label-info"><?php echo $db['noOfCollecton'];?></span></a>
                            <?php
                }
            }
        }
    }
    
    if (is_array($pathList)) {
        ?>
        <p class="main-header"><a href="<?php echo Theme::URL('Configuration/ListPaths'); ?>"><?php I18n::p('C_F'); ?></a></p>
        <?php
            $pathName = $chttp->getParam('path');
            foreach($pathList as $path) {
                $array_file=$confModel->listFiles($path);
                if ($pathName == $path) {
                    ?>
                    <a href="#config-menu" class="nav-header" data-toggle="collapse" title="<?php echo $path;?>">
                        <span class="glyphicon glyphicon-folder-open"></span><?php echo basename($path); ?><span class="label label-info"><?php echo count($array_file);?></span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?php echo Theme::URL('Configuration/Index', array('path' => $path)); ?>" class="nav-header" title="<?php echo $path;?>">
                        <span class="glyphicon glyphicon-folder-open"></span><?php echo basename($path); ?><span class="label label-info"><?php echo count($array_file);?></span>
                    </a>
                    <?php
                }
                if ($pathName == $path) {
                    ?>
                    <ul id="config-menu" class="nav nav-list collapse in">
                        <?php foreach ($array_file as $file) {?>
                        <li ><a href="<?php echo Theme::URL('Configuration/Record', array('path'=>$path, 'file' => $file['name'])); ?>"><span class="glyphicon glyphicon-file"></span><?php echo basename($file['name']); ?></a></li>
                        <?php } ?>
                    </ul>
                <?php 
                }
            }
    }
    
    
    if (is_array($tools)) {
        ?>
        <p class="main-header"><a href="<?php echo Theme::URL('Tool/Index'); ?>"><?php I18n::p('Tools'); ?></a></p>
        <?php
            foreach ($tools as $toolfunc=>$toolval) {
        ?>
                <a href="<?php echo Theme::URL('Tool/Index', array('tool' => $toolfunc)); ?>" class="nav-header" title="<?php echo $toolfunc; ?>">
                    <span class="glyphicon glyphicon-wrench"></span><?php echo $toolfunc; ?>
                </a>
                <?php
            }
    }
                ?>
</div>
