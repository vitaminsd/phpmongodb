<div class="header">
    <h3 class="page-title"><a href="<?php echo Theme::URL('Datatable/Index'); ?>">数据库</a> (<?php print_r($this->table); ?>) </h3>
</div>
<div class="navbar">
    <ul class="nav nav-tabs">
        <li class="<?php echo $this->data['tab']!='Search'?"active":''; ?>">
            <a href="#import" data-toggle="tab">导入</a>
        </li>
        <li  class="<?php echo $this->data['tab']=='Search'?"active":''; ?>">
            <a href="#search" data-toggle="tab">检索</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade <?php echo $this->data['tab']!='Search'?"active in":''; ?>" id="import">
        <?php include('import.php');?>
    </div>
    <div class="tab-pane fade <?php echo $this->data['tab']=='Search'?"active in":''; ?>" id="search">
        <?php include('search.php');?>
    </div>
</div>