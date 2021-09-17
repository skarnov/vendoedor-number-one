<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Advertise</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <form name="myForm" action="<?php echo base_url() ?>super_admin/update_advertise" method="POST" class="form-horizontal">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('message');
                        if (isset($msg)) {
                            echo $msg;
                            $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                    <div class="control-group">
                        <label class="control-label">Advertise Link</label>
                        <div class="controls">
                            <textarea name="advertise_link" class="input-xlarge" rows="6"><?php echo $advertise_info->advertise_link;?></textarea>
                            <input type="hidden" name="advertise_id" class="span6 typeahead" id="typeahead"  value="<?php echo $advertise_info->advertise_id;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Advertise Place</label>
                        <div class="controls">
                            <select name="advertise_place" class="input-large m-wrap" tabindex="1">
                                <option value="0">Select Place</option>
                                <option value="1">Home Page</option>
                                <option value="2">About Us</option>
                                <option value="3">Contact Us</option>
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
<script>
    document.forms['myForm'].elements['advertise_place'].value = '<?php echo $advertise_info->advertise_place; ?>';
    document.forms['myForm'].elements['advertise_publication_status'].value = '<?php echo $advertise_info->advertise_publication_status; ?>';
</script>