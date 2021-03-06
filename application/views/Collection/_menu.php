<div class="header">
    <h3 class="page-title"><i class="icon-database"></i><a href="<?php echo Theme::URL('Collection/Index', array('db' => $this->db)); ?>"><?php echo $this->db; ?></a> (<i class="icon-collection"></i><?php echo $this->collection; ?>) </h3>
</div>
<div class="btn-toolbar">
    <a class="btn btn-default <?php echo $this->application->view === 'record' ? 'active' : ''; ?>" onclick="callAjax('<?php echo Theme::URL('Collection/Record', array('db' => $this->db, 'collection' => $this->collection)); ?>')" href="javascript:void(0)"><?php I18n::p('BROWSE'); ?></a>
    <?php if (!Application::isReadonly()) { ?>
        <?php if ($this->application->view === 'record') { ?>
            <button class="btn btn-default" id="btn-insert"><?php I18n::p('INSERT'); ?></button>
        <?php } else { ?>
            <a class="btn btn-default <?php echo $this->application->view === 'insert' ? 'active' : ''; ?>" onclick="callAjax('<?php echo Theme::URL('Collection/Insert', array('db' => $this->db, 'collection' => $this->collection)); ?>')" href="javascript:void(0)"><?php I18n::p('INSERT'); ?></a>
        <?php } ?>
    <?php } ?>
    <?php if (!Application::isReadonly()) { ?>
        <a class="btn btn-default <?php echo $this->application->view === 'import' ? 'active' : ''; ?>" onclick="callAjax('<?php echo Theme::URL('Collection/Import', array('db' => $this->db, 'collection' => $this->collection)); ?>')" href="javascript:void(0)"><?php I18n::p('IMPORT'); ?></a>
    <?php } ?>
    <a class="btn btn-default <?php echo $this->application->view === 'search' ? 'active' : ''; ?>" onclick="callAjax('<?php echo Theme::URL('Collection/Search', array('db' => $this->db, 'collection' => $this->collection)); ?>')" href="javascript:void(0)"><?php I18n::p('SEARCH'); ?></a>
    <?php if (!Application::isReadonly()) { ?>
        <a class="btn btn-primary <?php echo $this->application->view === 'maintain' ? 'active' : ''; ?>" onclick="callAjax('<?php echo Theme::URL('Collection/Maintain', array('db' => $this->db, 'collection' => $this->collection)); ?>')" href="javascript:void(0)">Maintain</a>
    <?php } ?>
</div>
