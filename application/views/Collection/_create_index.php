<div class="tab-pane fade" id="IndexesCreate">
    <form id="tab1" method="post" action="index.php">
        <table id="tbl-create-indexes" class="table">
            <tr>
                <td><?php I18n::p('NAME'); ?></td>
                <td><input type="text" name="name" required="required"></td>
            </tr>
            <tr>
                <td><?php I18n::p('FIELDS'); ?></td>
                <td><input type="text" name="fields[]" required="required">
                    <select name="orders[]">
                        <option value="1">ASC</option>
                        <option value="-1">DESC</option>
                    </select>
                    &nbsp;<a href="javascript:void(0)" onclick="PMDIN.appendTR();" title="Add"><span class="glyphicon glyphicon-plus"></span></a>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td><?php I18n::p('UNIQUE'); ?></td>
                <td>&nbsp;<input type="checkbox"  value="1" name="unique" id="index_unique" onclick="PMDIN.isCheck(this)"></td>
            </tr>
            <tr id="drop_duplicates" style="display: none">
                <td>Drop duplicates?</td>
                <td>&nbsp;<input type="checkbox"  value="1" name="drop"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
        <div>
            <button class="btn btn-primary"><?php I18n::p('CREATE'); ?></button>
        </div>
        <input type="hidden"  name="load" value="Collection/CreateIndexes"/>
        <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
        <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
    </form>
</div>