<script type="text/javascript">
    function startCalc(){
      interval = setInterval("calc()",1);
    }
    function calc(){


      one2 = document.myForm.pq.value;
      two2 = document.myForm.pup.value; 
      document.myForm.pp.value = (one2*1) * (two2*1);
      }
    function stopCalc(){
      clearInterval(interval);
    }
</script>
<script type="text/javascript">
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } 
    catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
        xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
    }

    function categoryByCompany(companyId)
    {
        if (companyId) {
                serverPage = '<?php echo base_url(); ?>super_admin/show_company_category/' + companyId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function()
                {	
                    document.getElementById('company_category_option').innerHTML = xmlhttp.responseText ; 
                }
                xmlhttp.send(null);
        }
    }
</script>
<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Product</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <h3 style="color:green">
                    <?php
                    $msg=$this->session->userdata('message');
                    if(isset($msg)){
                    echo $msg;
                    $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <form name="myForm" action="<?php echo base_url(); ?>super_admin/update_product" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                            <input type="hidden" name="product_id" class="span6 typeahead" id="typeahead"  value="<?php echo $product_info->product_id;?>" >
                            <input type="text" name="product_name" required class="input-large" value="<?php echo $product_info->product_name;?>" />
                        </div>
                    </div>
                    <h3>To change category or company, Select and Deselect the dropdown menu</h3>
                    <div class="control-group">
                        <label class="control-label">Companies</label>
                        <div class="controls">
                            <select name="company_id" class="span4 typeahead" id="company_id" onchange="categoryByCompany(this.value)">
                                <option value="0">---Select Company----</option>
                                <?php
                                foreach ($all_company as $v_company) {
                                    ?>
                                    <option value="<?php echo $v_company->company_id; ?>"><?php echo $v_company->company_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" >
                        <label class="control-label">Categories</label>
                        <div class="controls" id="company_category_option">
                            <select name="category_id" class="span4 typeahead" id="category_id"></select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Summary</label>
                        <div class="controls">
                            <textarea name="product_summary" class="input-xlarge" rows="3"><?php echo $product_info->product_summary;?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Description</label>
                        <div class="controls">
                            <textarea name="product_description" class="input-xxlarge" rows="3"><?php echo $product_info->product_description;?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Manufacture</label>
                        <div class="controls">
                            <input type="text" name="product_manufacture" class="input-large" value="<?php echo $product_info->product_manufacture;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Weight</label>
                        <div class="controls">
                            <input type="text" name="product_weight" class="input-large" value="<?php echo $product_info->product_weight;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Quantity</label>
                        <div class="controls">
                            <input type="text" name="product_quantity" id="pq" onFocus="startCalc();" value="<?php echo $product_info->product_quantity;?>" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Unit Price</label>
                        <div class="controls">
                            <input type="text" name="product_unit_price" id="pup" onFocus="startCalc();" value="<?php echo $product_info->product_unit_price;?>" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Price</label>
                        <div class="controls">
                            <input type="text" name="product_price" readonly class="input-large"  id="pp" onFocus="startCalc();" value="<?php echo $product_info->product_price;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Discount Price</label>
                        <div class="controls">
                            <input type="text" name="product_discount_price" class="input-large" value="<?php echo $product_info->product_discount_price;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Discount Status</label>
                        <div class="controls">
                            <select name="product_discount_price_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Display Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Price Tag</label>
                        <div class="controls">
                            <input type="text" name="product_discount_percent" class="input-large" value="<?php echo $product_info->product_discount_percent;?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Price Tag Status</label>
                        <div class="controls">
                            <select name="product_discount_percent_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Display Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>      
                    <div class="control-group">
                        <label class="control-label">Product Publication Status</label>
                        <div class="controls">
                            <select name="product_publication_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Select Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn"><i class="icon-ok"></i> Save</button>
                        <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['company_id'].value = '<?php echo $product_info->company_id; ?>';
    document.forms['myForm'].elements['product_discount_price_status'].value = '<?php echo $product_info->product_discount_price_status; ?>';
    document.forms['myForm'].elements['product_discount_percent_status'].value = '<?php echo $product_info->product_discount_percent_status; ?>';
    document.forms['myForm'].elements['product_publication_status'].value = '<?php echo $product_info->product_publication_status; ?>';
</script>