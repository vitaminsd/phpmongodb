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
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>