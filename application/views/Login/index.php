<?php $autocomplete= isset(Config::$autocomplete) && Config::$autocomplete==TRUE ?'on':'off';?>
<div class="dialog">
    <div class="col-md-offset-4 col-md-4">
        <h3>Sign In</h3>
        <form id="tab2" method="post" action="index.php" class="form-group">
        <div class="form-group">
            <label><?php I18n::p('USERNAME'); ?></label>
            <input name="username" type="text" class="form-control" autocomplete="<?php echo $autocomplete;?>" autofocus>
        </div>
        <div class="form-group">
            <label><?php I18n::p('PASSWORD'); ?></label>
            <input name="password" type="password" class="form-control" id="password" autocomplete="<?php echo $autocomplete;?>">
            <?php
            if (Config::$authentication['authentication']) {
                ?>
                <label><?php I18n::p('Database'); ?></label>
                <input name="db" type="text" class="form-control" value="" autocomplete="<?php echo $autocomplete;?>">
            <?php } ?>
        </div>
        <div class="form-group">
            <button id="login" class="btn btn-primary pull-right"><?php I18n::p('LOGIN'); ?></button>
            <div class="clearfix"></div>
            <input type="hidden"  name="load" value="Login/Index"/>
        </div>
        </form>
    </div>
</div>
<script src="<?php echo Theme::getPath(); ?>js/md5.js"></script>
<script type="text/javascript">
    $("#login").click(function(){
        $("input#password").val(md5($("input#password").val()));
    });
</script>