<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Add Slider</h4>
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
                <form name="myForm" action="<?php echo base_url()?>super_admin/save_slider" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="btn-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider Image</label>
                        <div class="controls">
                            <input type="file" name="slider_image">
                        </div>
                    </div>        
                    <div class="control-group">
                        <label class="control-label">Slider Heading</label>
                        <div class="controls">
                            <input type="text" name="slider_heading" class="span6 typeahead" placeholder="Enter Slider Heading" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider Subheading</label>
                        <div class="controls">
                            <input type="text" name="slider_subheading" class="span6 typeahead" placeholder="Enter Slider Subheading" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider Link</label>
                        <div class="controls">
                            <input type="text" name="slider_link" class="span6 typeahead" placeholder="Enter Slider Heading Left" class="input-large" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider Status</label>
                        <div class="controls">
                            <select name="slider_publication_status" class="input-large m-wrap" tabindex="1">
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