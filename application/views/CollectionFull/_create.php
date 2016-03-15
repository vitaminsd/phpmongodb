<div class="block col-sm-12 col-md-5">
        <h4 id="block-heading"><?php echo I18n::t('CAE_COL');?></h4>
        <div class="block-body">
            <form id="form-create-collection" method="post" class="form-horizontal" action="index.php">
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php I18n::p('NAME'); ?></label>
                <div class="col-sm-10">
                <input type="text" value="" id="collection_name" name="collection" class="input-xlarge" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php I18n::p('IS_CAPPED'); ?></label>
                <div class="col-sm-10">
                <input type="checkbox" value="1" id="collection_capped" name="capped">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php I18n::p('SIZE'); ?></label>
                <div class="col-sm-10">
                <input type="number" value="" id="collection_size" name="size" class="input-xlarge ">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php I18n::p('Max'); ?></label>
                <div class="col-sm-10">
                <input type="number" value="" id="collection_max" name="max" class="input-xlarge">
                <input type="hidden" id="load-create" name="load" value="Collection/CreateCollection" />
                <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary" name="save"><?php I18n::p('CREATE'); ?> </button>
                </div>
            </div>
            </form>
        </div>
    </div>