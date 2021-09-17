<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Add Advertise</h4>
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
                <form name="myForm" action="<?php echo base_url() ?>super_admin/save_advertise" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="btn-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Advertise Picture</label>
                        <div class="controls">
                            <input type="file" name="advertise_image">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Advertise Link</label>
                        <div class="controls">
                            <textarea name="advertise_link" class="input-xlarge" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Advertise Place</label>
                        <div class="controls">
                            <select name="advertise_place" class="input-large m-wrap" tabindex="1">
                                <option value="0">Select Place</option>
                                <option value="1">Home Page</option>
                                <option value="2">Login Page Top</option>
                                <option value="2">Login Page Bottom</option>
                                <option value="3">Registration Page Top</option>
                                <option value="3">Registration Page Bottom</option>
                                <option value="4">About Page Top</option>
                                <option value="4">About Page Bottom</option>
                                <option value="5">Shopping Cart Page Top</option>
                                <option value="5">Shopping Cart Page Bottom</option>
                                <option value="6">Product Details 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <select name="advertise_publication_status" class="input-large m-wrap" tabindex="1">
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