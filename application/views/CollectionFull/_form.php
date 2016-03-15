<form method="post" name="form-delete-collection" id="form-delete-collection" action="index.php" >
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><?php I18n::p('DEL_C');?></h3>
        </div>
        <div class="modal-body">
            <input type="text" value="" id="pop-up-collection" name="collection" class="form-control input-lg" required="required">
            <h4 class="text-danger" id="pop-up-error-text"><span class="glyphicon glyphicon-exclamation-sign"></span>Are you sure you want to delete collection ?</h4>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><?php I18n::p('CANCEL');?></button>
            <button class="btn btn-primary" id="button-create-collection"><?php I18n::p('SAVE');?></button>
            <button id="button-delete-collection" class="btn btn-danger" data-dismiss="modal"><?php I18n::p('DELETE');?></button>
        </div>
    </div>
    </div>
    </div>
    <input type="hidden" id="pop-up-load" name="load" value="" />
    <input type="hidden" name="db" id="pop-up-db" value="<?php echo $this->db; ?>" />
    <input type="hidden" id="pop-up-old_collection" name="old_collection" value="" />
</form> 



<script type="text/javascript">
    $(document).ready(function() {
        $("a[data-edit-collection]").click(function() {
            $("#pop-up-collection").val(decodeURIComponent($(this).attr("data-edit-collection")));
            $("#pop-up-old_collection").val($(this).attr("data-edit-collection"));
            $("#pop-up-load").val("Collection/RenameCollection");
            $('#button-delete-collection').hide();
            $('#button-create-collection').show();
            $("#pop-up-collection").show();
            $('#pop-up-error-text').hide();
            $("#myModalLabel").text('Rename Collection "' + $(this).attr("data-edit-collection") + '"');
        });

        $("a[data-delete-collection]").click(function() {
            $("#pop-up-collection").val(decodeURIComponent($(this).attr("data-delete-collection")));
            $("#pop-up-load").val("Collection/DropCollection");
            $('#button-delete-collection').show();
            $('#button-create-collection').hide();
            $("#pop-up-collection").hide();
            $('#pop-up-error-text').show();
            $("#myModalLabel").text('Delete Collection "' + $(this).attr("data-delete-collection") + '"');
        });
        $('#button-delete-collection').click(function() {
            $('#form-delete-collection').submit();
            return true;
        });

    });


</script>
