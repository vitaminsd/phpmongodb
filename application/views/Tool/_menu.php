<div class="header">
    <h3 class="page-title"><i class="icon-database"></i><a href="<?php echo Theme::URL('Configuration/Index', array('path' => $this->path)); ?>" title="<?php echo $this->path;?>"><?php echo basename($this->path); ?></a> (<i class="icon-collection"></i><?php echo basename($this->file); ?>) </h3>
</div>
<div class="btn-toolbar">
    <a class="btn btn-default <?php echo $this->application->view === 'record' ? 'active' : ''; ?>" onclick="callAjax('<?php echo Theme::URL('Configuration/Record', array('path' => $this->path, 'file' => $this->file)); ?>')" href="javascript:void(0)"><?php I18n::p('BROWSE');?></a>
    <?php if (!Application::isReadonly()) { ?>
        <?php if ($this->application->view === 'record') { ?>
            <button class="btn btn-default" id="btn-insert"><?php I18n::p('EDIT'); ?></button>
        <?php }
        } ?>
</div>
