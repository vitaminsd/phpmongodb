<?php date_default_timezone_set("Asia/Shanghai");?>
<div class="header">
    <h3><?php I18n::p('C_F'); ?></h3>
</div>
<div class="row-fluid">
    <div class="block col-sm-12 col-md-6"  style="margin-right:5%">
        <div id="widget2container" class="block-body collapse in">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><?php I18n::p('NAME'); ?></th>
                        <th><?php I18n::p('M_T'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($this->data)) {
                        foreach ($this->data as $path) {
                            ?>
                            <tr>
                                <td><a title="<?php echo $path['name']; ?>" href="<?php echo Theme::URL('Configuration/Index', array('path' => $path['name'])); ?>"><?php echo basename($path['name']); ?></i></td>
                                <td><?php echo date("Y-m-d H:i:s", $path['mtime']) ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>