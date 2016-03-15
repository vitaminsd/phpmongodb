<div class="well">
    <form class="form-horizontal" method="get" action="index.php">
        <div class="form-group">
            <input type="hidden" id="load" name="load" value="Datatable/Search" />
            <input type="hidden" id="table" name="table" value="<?php echo $this->table; ?>"/>
            <label class="col-md-1 control-label">类型</label>
            <div class="col-md-2">
                <select class="form-control" id="type" name="type">
                    <option value="cnen">汉英</option>
                    <option value="encn">英汉</option>
                    <option value="cnug">汉维</option>
                    <option value="ugcn">维汉</option>
                    <option value="cnza">汉藏</option>
                    <option value="zacn">藏汉</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-1 control-label">搜索</label>
            <div class="col-md-6">
                <input type="text" id="src" name="src" class="form-control" required="required" placeholder="待检索句子/词" value="<?php echo isset($this->data['src'])?$this->data['src']:''; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-1 control-label"></label>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">检索</button>
            </div>
        </div>
    </form>
</div>
