<div class="header">
    <h3>Tools</h3>
</div>
<div class="well">
    <form role="form" class="form-horizontal" method="post" action="index.php">
    <div class="form-group">
        <label class="col-md-1 control-label">Tool</label>
        <div class="col-md-2">
        <select class="form-control" name="tool">
        <?php 
            foreach($this->model->tools as $toolfunc=>$toolval) {echo $toolfunc;
                ?>
                <option <?php if($this->toolfunc===$toolfunc) {echo 'selected';} ?>>
                <?php echo $toolfunc; ?>
                </option>
                <?php
            }
            ?>
        </select>
        </div>
        <label class="col-md-1 control-label">Type</label>
        <div class="col-md-3">
        <select class="form-control" name="type">
            <option value="cnen">Chinese =&gt; English</option>
            <option value="encn">English =&gt; Chinese</option>
            <option value="cnug">Chinese =&gt; Uighur</option>
            <option value="ugcn">Uighur =&gt; Chinese</option>
            <option value="cnza">Chinese =&gt; Tibetan</option>
            <option value="zacn">Tibetan =&gt; Chinese</option>
        </select>
        </div>
        <label id="more" class="col-md-1 control-label"><a>More</a></label>
        <div class="col-md-3" id="para" style="display:none">
            <input class="form-control"  name="para" placeholder="none_split=true;"></input>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary" id="btn-insert">Go</button>
            <input type="hidden" name="load" value="Tool/Execute"/>
        </div>
    </div>
    <div class="form-group">
        <textarea class="center-block" rows="25" style="width:80%;" name="data"></textarea>
    </div>
    </form>
</div>
<script type="text/javascript">
    $("#more").click(function(){
        $("#para").toggle();
    });
</script>