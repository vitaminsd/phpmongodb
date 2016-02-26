<!--create new datebase form-->
<div class="block col-sm-12 col-md-5">
    <p class="block-heading" id="block-heading"><?php I18n::p('C_DB');?></p>
    <div class="block-body">
        <form id="form-create-database" method="post" class="form-horizontal" action="index.php">
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php I18n::p('NAME');?></label>
                <div class="col-sm-10">
                <input type="text" value="" id="database" name="db" class="input-xlarge" required="required">
                <input type="hidden" id="load-create" name="load" value="Database/Save" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary" name="btnCreateDb"><?php I18n::p('SAVE');?> </button>
                </div>
            </div>
        </form>
    </div>
</div>