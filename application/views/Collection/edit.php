<?php require_once '_menu.php'; ?>
<div class="well" id="container-insert" >
    <ul class="nav nav-tabs">
        <li class="<?php echo $this->data['format'] === 'json'?'active':''; ?>">
            <a href="#JSON" data-toggle="tab"><?php I18n::p('JSON');?></a>
        </li>
        <li class="<?php echo $this->data['format'] === 'array'?'active':''; ?>">
            <a href="#Array" data-toggle="tab"><?php I18n::p('Array');?></a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane <?php echo $this->data['format'] === 'array' ? 'active in' : 'fade'; ?>" id="Array">
            <form id="tab2" method="post" action="index.php">
            <div class="form-group form-inline">
                <br>
                <label>_id: </label>
                <input type="text" class="form-control" style="width: 300px" name="id" id="id_edit" value="<?php echo "\n" . $this->data['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <textarea name="data" rows="16" class="form-control">
<?php echo $this->data['record']['array']; ?>
                </textarea>
                <div>
                    <br>
                    <button class="btn btn-primary"><?php I18n::p('SAVE');?></button>
                </div>
                <input type="hidden" name="id_type" value="<?php echo $this->request->getParam('id_type'); ?>" />
                <input type="hidden"  name="load" value="Collection/EditRecord"/>
                <input type="hidden" name="format" value="array" />
                <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
                <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
            </div>
            </form>
        </div>
        <div class="tab-pane <?php echo $this->data['format'] === 'json' ? 'active in' : 'fade'; ?>" id="JSON">
            <form id="tab3" method="post" action="index.php">
            <div class="form-group form-inline">
                <br>
                <label for="name">_id: </label>
                <input type="text" class="form-control" style="width: 300px" name="id" id="id_edit" value="<?php echo "\n" . $this->data['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <textarea name="data" rows="16" style="width:100%;">
<?php echo $this->data['record']['json']; ?>
                </textarea>
                <div>
                    <br>
                    <button class="btn btn-primary"><?php I18n::p('SAVE');?></button>
                </div>
                <input type="hidden" name="id_type" value="<?php echo $this->request->getParam('id_type'); ?>" />
                <input type="hidden"  name="load" value="Collection/EditRecord"/>
                <input type="hidden" name="format" value="json" />
                <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
                <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
            </div>
            </form>
        </div>
    </div>

</div>