<?php require_once '_menu.php'; ?>

<form method="post" action="index.php" enctype="multipart/form-data">
    <div class="well">
        <div id="block_export_method">
            <h4><?php echo I18n::t('I_I_T_C',$this->collection );?> </h4>
            <div class="block-body">
                <?php I18n::p('JSON_FILE');?> <input type="file" name="import_file" id="import_file"/>
            </div>
        </div>
        
        <input type="hidden" name="db" id="db-export" value="<?php echo $this->db; ?>" />
        <input type="hidden" name="collection" id="collection_export" value="<?php echo $this->collection; ?>" />
        <input type="hidden" name="load" value="Collection/Import" />
        <br>
        <input class="btn btn-primary btn-large" type="submit" name="btnExport" Value="<?php I18n::p('IMPORT');?>" />
    </div>
</form>    
 
