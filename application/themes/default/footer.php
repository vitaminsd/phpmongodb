<?php defined('PMDDA') or die('Restricted access'); ?>

</div>
<div id="foot" class="footer">
    <h5 class="text-right text-info">&copy; <?php echo date('Y');?> iflytek.com&nbsp;</h5>
</div>
</div>

<script src="<?php echo Theme::getPath(); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo Theme::getPath(); ?>js/PHPMongoDB.js"></script>
<script src="<?php echo Theme::getPath(); ?>js/action.js"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function() {
            return false;
        });
    });
</script>
<script>
    function callAjax(url) {
        url = url + '&theme=false'
        $(document).ready(function() {
            $.get(url, function(data, status) {
               if(status=='success'){
                 $( "#middle-content" ).html(data);  
               }
            });
        })
    }
    $(function() {
       if($( ".sidebar-nav" ).height()>$( ".content" ).height()){
           $( ".content" ).css('height',$( ".sidebar-nav" ).height())
       }
    });
</script>    
</body>
</html>
