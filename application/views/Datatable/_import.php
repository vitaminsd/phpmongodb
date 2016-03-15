<div class="well">
    <form class="form-horizontal" method="post" action="index.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-1 control-label">类型</label>
            <div class="col-md-2">
                <select class="form-control" name="type">
                    <option value="cnen">汉英</option>
                    <option value="encn">英汉</option>
                    <option value="cnug">汉维</option>
                    <option value="ugcn">维汉</option>
                    <option value="cnza">汉藏</option>
                    <option value="zacn">藏汉</option>
                </select>
            </div>
            <div class="checkbox col-md-2">
                <label>
                    <input type="checkbox" name="verify">效果验证
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1 control-label">上传CSV</label>
            <div class="col-md-4">
                <input type="file" class="form-control" id="inputfile" required="required" name="infile">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1 control-label">操作员</label>
            <div class="col-md-6">
                <input type="text" name="editor" class="form-control" required="required" placeholder="用户名">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-1 control-label">修改信息</label>
            <div class="col-md-6">
                <textarea rows="5" class="form-control" name="editinfo" required="required" placeholder="修改信息"></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-1 control-label"></label>
            <div class="col-md-1">
                <input type="hidden" name="load" value="Datatable/Import"/>
                <input type="hidden" name="table" value="<?php echo $this->table; ?>"/>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
</div>