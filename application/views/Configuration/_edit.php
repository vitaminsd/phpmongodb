<div class="well" id="container-insert" style="float:left; <?php echo isset($this->data['isAjax'])?'display:block':'display:none';?>">
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="Array">
            <form id="tab" method="post" action="index.php">
                <textarea name="data" rows="20" class="input-xlarge" style="width:95%;"><?php echo $this->data; ?></textarea>
                <div>
                    <button class="btn btn-primary"><?php I18n::p('SAVE');?></button>
                </div>
                <input type="hidden" name="load" value="Configuration/EditRecord"/>
                <input type="hidden" name="path" value="<?php echo $this->path; ?>" />
                <input type="hidden" name="file" value="<?php echo $this->file; ?>" />
                <input type="hidden" name="ori_data" value="<?php echo $this->data; ?>" />
                <input type="hidden" name="configuration" value="<?php echo $this->configuration; ?>" />
            </form>
        </div>
    </div>
</div>