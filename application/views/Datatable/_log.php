<div class="alert alert-info" style="<?php echo isset($this->data['loginfo'])?'display:block':'display:none' ?>">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-1 control-label">运行信息</label>
            <div class="col-md-6">
            <textarea style="background-color:#333333; color:white;" rows="5" class="form-control" id="loginfo" disabled><?php if(isset($this->data['loginfo'])) {print_r($this->data['loginfo']);} ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1 control-label"></label>
            <div class="col-md-1">
                <button class="btn btn-primary" onclick="saveFile()">下载日志</button>
            </div>
        </div>
    </div>
</div>