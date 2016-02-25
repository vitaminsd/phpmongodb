<?php defined('PMDDA') or die('Restricted access'); ?>
<div class="sidebar-nav">

    <?php
    $chttp=new Chttp();
    $dbList = Widget::get('DBList');
    $confModel = new Configuration;
    $pathList = $confModel->paths;

    if (is_array($dbList['databases'])) {
    ?><p class="main-header"><?php I18n::p('DB'); ?></p><?php
        $dbName = $chttp->getParam('db');
        if (empty($dbName)) {
    ?>
            <ul  class="nav nav-list collapse in bodymargin">
                <?php
                foreach ($dbList['databases'] as $db) {
                    ?>
                    <a href="<?php echo Theme::URL('Collection/Index', array('db' => $db['name'])); ?>" class="nav-header" >
                        <i class="icon-database"></i><?php echo $db['name']; ?><span class="label label-info"><?php echo !empty($db['noOfCollecton'])?$db['noOfCollecton']:'';?></span></a>
                <?php } ?>


            </ul>
            <?php
        } else {
            foreach ($dbList['databases'] as $db) {
                if ($dbName == $db['name']) {
                    $collectionList = Widget::get('CollectonList');
                    ?>
                    <a href="#accounts-menu" class="nav-header" data-toggle="collapse">
                        <i class="icon-database"></i><?php echo $db['name']; ?><span class="label label-info"><?php echo $db['noOfCollecton'];?></span>
                    </a>
                    <?php 
                    if ($collectionList) { 
                        
                        ?>
                        <ul id="accounts-menu" class="nav nav-list collapse in">
                            <?php foreach ($collectionList as $collection) {?>
                            <li ><a href="<?php echo Theme::URL('Collection/Record', array('db' => $db['name'], 'collection' => $collection['name'])); ?>"><i class="icon-collection"></i><?php echo $collection['name'],' ('.$collection['count'],')'; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php
                        
                    }
                } else {
                    ?>
                    <a href="<?php echo Theme::URL('Collection/Index', array('db' => $db['name'])); ?>" class="nav-header" >
                        <i class="icon-database"></i><?php echo $db['name']; ?><span class="label label-info"><?php echo $db['noOfCollecton'];?></span></a>
                            <?php
                }
            }
        }
    }
    
    if (is_array($pathList)) {
        ?>
        <p class="main-header"><?php I18n::p('C_F'); ?></p>
        <?php
            $pathName = $chttp->getParam('path');
            foreach($pathList as $path) {
                $array_file=$confModel->listFiles($path);
                if ($pathName == $path) {
                    ?>
                    <a href="#config-menu" class="nav-header" data-toggle="collapse" title="<?php echo $path;?>">
                        <i class="icon-database"></i><?php echo basename($path); ?><span class="label label-info"><?php echo count($array_file);?></span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?php echo Theme::URL('Configuration/Index', array('path' => $path)); ?>" class="nav-header" title="<?php echo $path;?>">
                        <i class="icon-database"></i><?php echo basename($path); ?><span class="label label-info"><?php echo count($array_file);?></span>
                    </a>
                    <?php
                }
                if ($pathName == $path) {
                    ?>
                    <ul id="config-menu" class="nav nav-list collapse in">
                        <?php foreach ($array_file as $file) {?>
                        <li ><a href="<?php echo Theme::URL('Configuration/Record', array('path' => $path, 'file' => $file['name'])); ?>"><i class="icon-collection"></i><?php echo $file['name']; ?></a></li>
                        <?php } ?>
                    </ul>
                <?php 
                }
            }
    }
        ?>
</div>
