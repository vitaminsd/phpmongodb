<div class="header">
    <h3><?php echo $this->db;?></h3>
</div>
<div class="row-fluid">
    <div class="block col-sm-12 col-md-6"  style="margin-right:5%">
        <div id="widget2container" class="block-body collapse in">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><?php I18n::p('NAME'); ?></th>
                        <th><?php I18n::p('T_C'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->data['collectionList'] as $collection) { ?>
                        <tr>
                            <td><a  href="<?php echo Theme::URL('Collection/Record', array('db' => $this->db, 'collection' => $collection['name'])); ?>"><?php echo $collection['name']; ?></a></td>
                            <td><?php echo $collection['count']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
