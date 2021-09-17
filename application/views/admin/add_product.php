<script type="text/javascript">
    function startCalc() {
        interval = setInterval("calc()", 1);
    }
    function calc() {
        one2 = document.myForm.pq.value;
        two2 = document.myForm.pup.value;
        document.myForm.pp.value = (one2 * 1) * (two2 * 1);
        var num = pp;
        var n = num.toFixed(2);
        document.getElementById("demo").innerHTML = n;
    }
    function stopCalc() {
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
                <h4><i class="icon-reorder"></i> Add Product</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('message');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <form name="myForm" action="<?php echo base_url() ?>super_admin/save_product" id="main" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="btn-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                            <input type="text" name="product_name" required placeholder="Enter Product Name" class="input-large" />
                        </div>
                    </div>
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
                            <textarea name="product_summary" required class="input-xlarge" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group admin_cleditor">
                        <label class="control-label">Product Description</label>
                        <div class="controls">
                            <textarea name="product_description" class="input-xxlarge" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Manufacture</label>
                        <div class="controls">
                            <input type="text" name="product_manufacture" placeholder="Enter Product Manufacture" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Weight</label>
                        <div class="controls">
                            <input type="text" name="product_weight" placeholder="Enter Product Weight" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="color:red;">Minimum photo upload size 300px x 300px</label>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Photo</label>
                        <div class="controls">
                            <input type="file" name="product_photo_0">
                            <input type="file" name="product_photo_1">
                            <input type="file" name="product_photo_2">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Quantity</label>
                        <div class="controls">
                            <input type="text" name="product_quantity" id="pq" onFocus="startCalc();" required placeholder="Enter Product Quantity" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Unit Price</label>
                        <div class="controls">
                            <input type="text" name="product_unit_price" id="pup" onFocus="startCalc();" required placeholder="Enter Product Unit Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Product Price</label>
                        <div class="controls">
                            <input type="text" name="product_price" id="pp" onFocus="startCalc();" readonly placeholder="Enter Product Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Old Price</label>
                        <div class="controls">
                            <input type="text" name="product_discount_price" placeholder="Product Discount Price" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Discount Status</label>
                        <div class="controls">
                            <select name="product_discount_price_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Display Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price Tag</label>
                        <div class="controls">
                            <input type="number" name="product_discount_percent" placeholder="Product Tag" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price Tag Status</label>
                        <div class="controls">
                            <select name="product_discount_percent_status" class="input-large m-wrap" tabindex="1">
                                <option value="0">Display Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>      
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
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