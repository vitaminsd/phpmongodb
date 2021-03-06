<?php require_once '_menu.php'; ?>
<div class="well" id="container-indexes">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#searchColVal" data-toggle="tab"><?php I18n::p('F_V'); ?></a></li>
        <li ><a href="#searhArray" data-toggle="tab"><?php I18n::p('Array'); ?></a></li>
        <li><a href="#searchJSON" data-toggle="tab"><?php I18n::p('JSON'); ?></a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <!-- Key Value Search Start -->
        <div class="tab-pane active in" id="searchColVal">
            <form id="tab1" method="get" action="index.php">
                <table class="table">
                <tbody id="tbl-search-col-val">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Field</th>
                        <th>Operator</th>
                        <th>Value</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="form-control" type="text" name="query[]"  placeholder="Enter Attribute"></td>
                        <td><select class="form-control" name="query[]" style="width: auto;">
                                <option value="=">=</option>
                                <option value="$gt">&gt;</option>
                                <option value="$gte">&ge;</option>
                                <option value="$lt">&lt;</option>
                                <option value="$lte">&le;</option>
                                <option value="$ne">&ne;</option>
                            </select>
                        </td>
                        <td><input class="form-control" type="text" name="query[]" placeholder="Enter Value"></td>
                        <td><a href="javascript:void(0)" onclick="PMDS.appendTR();" class="icon-plus" title="Add"><span class="glyphicon glyphicon-plus"></span></a>&nbsp;</td>
                    </tr>
                </tbody>
                <tbody id="tbl-order-by">
                    <tr>
                    <th>&nbsp;</th>
                        <th>Order By</th>
                        <th>Order</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tr>
                    <th>&nbsp;</th>
                        <td><input class="form-control" type="text" name="order_by[]" placeholder="Enter Attribute"></td>
                        <td><select class="form-control" name="orders[]" style="width: auto;"><option value="1">ASC</option><option value="-1">DESC</option></select></td>
                        <td></td>
                        <td><a href="javascript:void(0)" onclick="PMDS.appendOrderBy();" title="Add" ><span class="glyphicon glyphicon-plus"></span></a></td>
                    </tr>
                </tbody>
                </table>

                <div>
                    <button class="btn btn-primary">Search</button>
                </div>
                <input type="hidden"  name="load" value="Collection/Record"/>
                <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
                <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
                <input type="hidden" name="search" value="1" />
                <input type="hidden" name="type" value="fieldvalue" />
            </form>
        </div>
        <!-- Key Value Search End -->
        <div class="tab-pane fade" id="searhArray">
            <form id="tab2" method="get" action="index.php">
                <textarea class="form-control" name="query" rows="3" style="width:100%;">array (
)</textarea>
                <div>
                    <button class="btn btn-primary">Search</button>
                </div>
                <input type="hidden"  name="load" value="Collection/Record"/>
                <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
                <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
                <input type="hidden" name="search" value="1" />
                <input type="hidden" name="type" value="array" />
            </form>
        </div>
        <div class="tab-pane fade" id="searchJSON">
            <form id="tab3" method="get" action="index.php">
                <textarea class="form-control" name="query" rows="3" style="width:100%;">{
  
}</textarea>
                <div>
                    <button class="btn btn-primary">Search</button>
                </div>
                <input type="hidden"  name="load" value="Collection/Record"/>
                <input type="hidden" name="db" value="<?php echo $this->db; ?>" />
                <input type="hidden" name="collection" value="<?php echo $this->collection; ?>" />
                <input type="hidden" name="search" value="1" />
                <input type="hidden" name="type" value="json" />
            </form>
        </div>

    </div>
</div>
