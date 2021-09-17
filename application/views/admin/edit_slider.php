<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Slider</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <form name="myForm" action="<?php echo base_url()?>super_admin/update_slider" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <h3 style="color:green">
                        <?php
                        $msg=$this->session->userdata('message');
                        if(isset($msg)){
                        echo $msg;
                        $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                    <div class="control-group">
                        <label class="control-label">Slider Heading</label>
                        <div class="controls">
                            <input type="text" name="slider_heading" required class="span6 typeahead" placeholder="Enter Slider Heading" class="input-large" value="<?php echo $slider_info->slider_heading; ?>" />
                            <input type="hidden" name="slider_id" class="span6 typeahead" id="typeahead"  value="<?php echo $slider_info->slider_id;?>" >
                        </div>
                    </div>                    
                    <div class="control-group">
                        <label class="control-label">Slider Subheading</label>
                        <div class="controls">
                            <input type="text" name="slider_subheading" class="span6 typeahead" placeholder="Enter Slider Subheading" class="input-large" value="<?php echo $slider_info->slider_subheading; ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider Heading Left</label>
                        <div class="controls">
                            <input type="text" name="slider_link" class="span6 typeahead" placeholder="Enter Slider Heading Left" class="input-large" value="<?php echo $slider_info->slider_link; ?>" />
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
<script>
    document.forms['myForm'].elements['slider_publication_status'].value = '<?php echo $slider_info->slider_publication_status; ?>';
</script>