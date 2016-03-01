<div class="header">
    <h3>Execute</h3>
</div>

<div class="well" >
<form id="tab3" method="post" action="index.php?load=Server/Execute">
    <textarea name="code" rows="5" class="input-xlarge" style="width:100%;"><?php echo $this->data['code']; ?></textarea>
    <div>
        <br>
        Database : <select name="db">
            <?php
            foreach ($this->data['databases']['databases'] as $db) {
                echo '<option value="' . $db['name'] . '">' . $db['name'] . '</option>';
            }
            ?>    
        </select>
    </div>
    <div>
        <br>
        <button class="btn btn-primary"><?php I18n::p('Execute'); ?></button>
    </div>
</form>

    <p>
    <?php
    if (!empty($this->data['response'])) {
        echo "<pre>";
        print_r($this->data['response']);
        echo "</pre>";
    }
    ?> 
    </p>
</div>