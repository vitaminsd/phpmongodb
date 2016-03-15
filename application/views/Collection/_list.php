<div class="well">
<?php
    if (!isset($this->data['record']))
        return;
?>
    <div style="margin-bottom:20px;">
    <form class="form-inline">
        <div class="form-group">
            <label class="text-primary">Order By</label>
            <input type="text" name="order_by[]" class="form-control" placeholder="_id">
        </div>
        <div class="form-group">
            <select class="form-control" name="orders[]">
                <option value="-1">DESC</option>
                <option value="1">ASC</option>
            </select>
        </div>
        <input type="hidden" name="load" value="Collection/Record"/>
        <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
        <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
        <button type="submit" class="btn btn-primary">Order</button>
    </form>
    </div>
    <div id="record-json" style="display:block">
        <?php
        $i = -1;
        foreach ($this->data['record']['json'] as $cursor) {
            ++$i;
            if (isset($this->data['record']['document'][0]['_id']) && !Application::isReadonly()) {
                echo '&nbsp;<a href="javascript:void(0)"  onclick="callAjax(\'' . Theme::URL('Collection/EditRecord', array('db' => $this->db, 'collection' => $this->collection, 'id' => $this->data['record']['document'][$i]['_id'], 'format' => 'json', 'id_type' => gettype($this->data['record']['document'][$i]['_id']))) . '\')" title="Edit">Edit <span class="glyphicon glyphicon-edit"></span></a>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="' . Theme::URL('Collection/DeleteRecord', array('db' => $this->db, 'collection' => $this->collection, 'id' => $this->data['record']['document'][$i]['_id'], 'id_type' => gettype($this->data['record']['document'][$i]['_id']))) . '" class="icon-remove" title="Delete">Delete <span class="glyphicon glyphicon-remove"></span></a>';
            }
            echo "<pre>";
            print_r($cursor);
            echo "</pre>";
        }
        ?>
    </div>
</div>
   
<?php Theme::pagination($this->getModel()->totalRecord($this->db, $this->collection)); ?>