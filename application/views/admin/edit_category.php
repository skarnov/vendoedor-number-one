<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Category</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('message');
                        if (isset($msg)) {
                            echo $msg;
                            $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                    <form name="myForm" class="form-horizontal" action="<?php echo base_url(); ?>super_admin/update_category" method="POST">
                        <div class="control-group">
                            <label class="control-label">Product Company</label>
                            <div class="controls">
                                <select name="company_id" class="span4 typeahead">
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
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name</label>
                            <div class="controls">
                                <input type="text" name="category_name" required class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="<?php echo $category_info->category_name; ?>">
                                <input type="hidden" name="category_id" class="span6 typeahead" id="typeahead" value="<?php echo $category_info->category_id; ?>" >
                            </div>
                        </div>    
                        <div class="control-group">
                            <label class="control-label">Category Publication Status</label>
                            <div class="controls">
                                <select name="category_publication_status" class="input-large m-wrap" tabindex="1">
                                    <option value="0">Select Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="Submit" class="btn btn-primary" name="btn">Edit Category</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['category_publication_status'].value = '<?php echo $category_info->category_publication_status; ?>';
</script>