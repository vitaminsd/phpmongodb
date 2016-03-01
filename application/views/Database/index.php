<div class="header">
    <h3><?php I18n::p('DB'); ?></h3>
</div>
<div class="row-fluid">
    <div class="block col-sm-12 col-md-6"  style="margin-right:5%">
        <div id="widget2container" class="block-body collapse in">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><?php I18n::p('NAME'); ?></th>
                        <th><?php I18n::p('S_O_D'); ?></th>
                        <th >&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($this->data['dbList']['databases']) && is_array($this->data['dbList']['databases'])) {
                        foreach ($this->data['dbList']['databases'] as $db) {
                            ?>
                            <tr>
                                <td><a href="<?php echo Theme::URL('Collection/Index', array('db' => $db['name'])); ?>"><?php echo $db['name']; ?></i></td>
                                <td><?php echo $db['sizeOnDisk']; ?></td>
                                <?php if (!Application::isReadonly()) { ?>
                                    <td>
                                        <a href="#myModal" data-edit-db="<?php echo $db['name']; ?>" role="button" data-toggle="modal" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="#myModal" data-delete-db="<?php echo $db['name']; ?>" role="button" data-toggle="modal" title="Remove"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    if (!Application::isReadonly())
        require_once '_create.php';
    ?>
</div>
<?php
if (!Application::isReadonly())
    require_once '_form.php';
?>