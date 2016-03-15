<div class="header">
    <h3>数据库</h3>
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
                    <tr>
                        <td><a href="<?php echo Theme::URL('Datatable/Record', array('table'=>'sentence')); ?>">句库</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo Theme::URL('Datatable/Record', array('table'=>'word')); ?>">词库</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>