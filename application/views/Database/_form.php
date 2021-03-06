<form method="post" name="form-drop-db" id="form-drop-db" action="index.php">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><?php I18n::p('DEL_C');?></h3>
        </div>
        <div class="modal-body">
            <input type="text" value="" id="pop-up-database" name="db" class="form-control input-lg" required="required">
            <h4 class="text-danger" id="pop-up-error-text"><span class="glyphicon glyphicon-exclamation-sign"></span>Are you sure you want to delete database ?</h4>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><?php I18n::p('CANCEL');?></button>
            <button class="btn btn-primary" id="button-create-database"><?php I18n::p('SAVE');?></button>
            <button id="button-delete-database" class="btn btn-danger" data-dismiss="modal"><?php I18n::p('DELETE');?></button>
        </div>
    </div>
    </div>
    </div>
    <input type="hidden" id="pop-up-load" name="load" value="" />
    <input type="hidden" id="pop-up-old-database" name="old_db" value="" />
</form> 

<script type="text/javascript">
    $(document).ready(function() {
        $("a[data-delete-db]").click(function() {
            $("#pop-up-database").val($(this).attr("data-delete-db"));
            $("#pop-up-load").val("Database/Drop");
            $('#button-delete-database').show();
            $('#button-create-database').hide();
            $("#pop-up-database").hide();
            $('#pop-up-error-text').show();
            $("#myModalLabel").text('Delete Database "' + $(this).attr("data-delete-db") + '"');
        });
        $("a[data-edit-db]").click(function() {
            $("#pop-up-database").val($(this).attr("data-edit-db"));
            $("#pop-up-old-database").val($(this).attr("data-edit-db"));
            $("#pop-up-load").val("Database/Update");
            $('#button-delete-database').hide();
            $('#button-create-database').show();
            $("#pop-up-database").show();
            $('#pop-up-error-text').hide();
            $("#myModalLabel").text('Rename Database "' + $(this).attr("data-edit-db") + '"');
        });
        $('#button-delete-database').click(function() {
            $('#form-drop-db').submit();
            return true;
        });
    });
</script>

