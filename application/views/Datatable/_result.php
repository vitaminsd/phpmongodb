<div class="well" style="<?php echo isset($this->data['result'])?'display:block':'display:none' ?>">
    <form class="form-horizontal" method="get" action="index.php">
        <div class="form-group">
            <input type="hidden" id="load" name="load" value="Datatable/Modify" />
            <input type="hidden" id="table" name="table" value="<?php echo $this->table; ?>"/>
            <label class="col-md-1 control-label">检索结果</label>
            <div class="col-md-10 table-responsive" style="max-height:400px; overflow-y:auto;">
            <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                <th>原文本</th>
                <th>目标文本</th>
                <th>状态</th>
                <th><input type="checkbox" name="check-all" id="check-all" onclick="checkall()";></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($this->data['result'] as $record) {
                $jsonline = json_decode($record, true);
                ?>
                <tr>
                <td><?php echo $jsonline['src']; ?></td>
                <td><?php echo $jsonline['tgt']; ?></td>
                <td><?php echo $jsonline['is_active']; ?></td>
                <td><input type="checkbox" class="check-remove" name="ids[]" value="<?php echo $jsonline['_id']; ?>"></td>
                <?php
            }
            ?>
            </tbody>
            </table>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1 control-label"></label>
            <div class="col-md-1">
                <a type="submit" class="btn btn-primary" href="<?php echo Theme::URL('Datatable/Export'); ?>">导出</a>
            </div>
            <div class="col-md-1">
                <a class="btn btn-danger" onclick="editResult()">修改</a>
            </div>
    <div class="edit-result" style="display:none">
            <div class="radio col-md-2">
               <label>
                  <input type="radio" name="optionsRadios" value="forbid" checked>禁用
               </label>
               <label>
                  <input type="radio" name="optionsRadios" value="delete">删除
               </label>
            </div>
    </div>
        </div>
    <div class="edit-result" style="display:none">
        <div class="form-group">
            <label class="col-md-1 control-label">操作员</label>
            <div class="col-md-6">
                <input type="text" name="editor" class="form-control" required="required" placeholder="用户名">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-1 control-label">修改信息</label>
            <div class="col-md-6">
                <textarea rows="5" class="form-control" name="edit-info" required="required" placeholder="修改信息"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-1 control-label"></label>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </div>
    </form>
</div>