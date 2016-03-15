<div class="well" id="container-insert" style="float:left;   width: 40%; <?php echo isset($this->data['isAjax'])?'display:block':'display:none';?>">
    <div id="myTabContent" class="edit-content">
        <div class="tab-pane active">
            <form id="tab" method="post" action="index.php">
                <textarea rows="25" style="width:95%;" name="data"><?php echo $this->data; ?></textarea>
                <div>
                    <button class="btn btn-primary"><?php I18n::p('SAVE');?></button>
                </div>
                <input type="hidden" name="load" value="Configuration/EditRecord"/>
                <input type="hidden" name="path" value="<?php echo $this->path; ?>" />
                <input type="hidden" name="file" value="<?php echo $this->file; ?>" />
            </form>
        </div>
    </div>
</div>