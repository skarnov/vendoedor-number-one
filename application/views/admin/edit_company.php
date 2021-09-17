<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Company</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <h3 style="color:green">
                        <?php
                        $msg=$this->session->userdata('message');
                        if(isset($msg)){
                        echo $msg;
                        $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                    <form name="myForm" class="form-horizontal" action="<?php echo base_url();?>super_admin/update_company" method="POST">
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Company Name</label>
                            <div class="controls">
                                <input type="text" name="company_name" required class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="<?php echo $company_info->company_name;?>">
                                <input type="hidden" name="company_id" class="span6 typeahead" id="typeahead" value="<?php echo $company_info->company_id;?>" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Company Email</label>
                            <div class="controls">
                                <input type="email" name="company_email" required class="span6 typeahead" id="typeahead" value="<?php echo $company_info->company_email;?>" data-provide="typeahead" data-items="4">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <textarea name="company_description" required class="input-xxlarge" rows="3"><?php echo $company_info->company_description;?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <select name="company_publication_status" class="span4 typeahead" id="typeahead" data-provide="typeahead" style="margin-left: 1.8%;">
                                <option>Please Select One</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="Submit" class="btn btn-primary" name="btn">Edit Company</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['company_publication_status'].value = '<?php echo $company_info->company_publication_status; ?>';
</script>