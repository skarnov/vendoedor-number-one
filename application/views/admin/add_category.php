<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Add Category</h4>
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
                    <form class="form-horizontal" action="<?php echo base_url(); ?>super_admin/save_category" method="POST">
                        <div class="btn-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Company</label>
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
                                <input type="text" name="category_name" required class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <select name="category_publication_status" class="span4 typeahead" id="typeahead" data-provide="typeahead" style="margin-left: 1.8%;">
                                <option>Please Select One</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="Submit" class="btn btn-primary" name="btn">Add Category</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>