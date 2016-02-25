<?php date_default_timezone_set("Asia/Shanghai");?>
<div class="header">
    <h1 class="page-title"><?php I18n::p('C_F'); ?></h1>
</div>
<div class="row-fluid">
    <div class="block span6">
        <div class="block-heading">
            <a href="#widget2container" data-toggle="collapse" title="<?php echo $this->path;?>"><?php echo basename($this->path); ?></a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table table-hover list">
                <thead>
                    <tr>
                        <th><?php I18n::p('NAME'); ?></th>
                        <th><?php I18n::p('S_O_D'); ?></th>
                        <th><?php I18n::p('M_T'); ?></th>
                        <th >&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->file as $file) {
                        ?>
                        <tr>
                            <td><a href="<?php echo Theme::URL('Configuration/Record', array('path' => $this->path, 'file' => $file['name'])); ?>"><?php echo $file['name']; ?></i></td>
                            <td><?php echo $file['size'] ?></td>
                            <td><?php echo date("Y-m-d H:i:s", $file['mtime']) ?></td>
                            <?php if (!Application::isReadonly()) { ?>
                                <td>
                                    <a href="#myModal" data-edit-db="<?php echo $db['name']; ?>" role="button" data-toggle="modal" class="icon-edit" title="Edit">&nbsp;</a>
                                    <a href="#myModal" data-delete-db="<?php echo $db['name']; ?>" role="button" data-toggle="modal" class="icon-remove" title="Remove">&nbsp;</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>