<?php date_default_timezone_set("Asia/Shanghai");?>
<div class="header">
    <h3 title="<?php echo $this->path;?>"><?php echo basename($this->path); ?></h3>
</div>
<div class="row-fluid">
    <div class="block col-sm-12 col-md-6">
        <table class="table table-hover list">
            <thead>
                <tr>
                    <th><?php I18n::p('NAME'); ?></th>
                    <th><?php I18n::p('S_O_D'); ?></th>
                    <th><?php I18n::p('M_T'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->file as $file) {
                    ?>
                    <tr>
                        <td><a href="<?php echo Theme::URL('Configuration/Record', array('path'=>$this->path, 'file' => $file['name'])); ?>"><?php echo basename($file['name']); ?></i></td>
                        <td><?php echo $file['size'] ?></td>
                        <td><?php echo date("Y-m-d H:i:s", $file['mtime']) ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>