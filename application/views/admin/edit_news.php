<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Add News</h4>
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
                    <form name="myForm" class="form-horizontal" action="<?php echo base_url(); ?>super_admin/update_news" method="POST">
                        <div class="btn-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">News Title</label>
                            <div class="controls">                            
                                <input type="text" name="news_title" required class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" value="<?php echo $news_info->news_title;?>">
                                <input type="hidden" name="news_id" class="span6 typeahead" id="typeahead" value="<?php echo $news_info->news_id;?>" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Main News</label>
                            <div class="controls">
                                <textarea name="main_news" required class="input-xxlarge" rows="10"><?php echo $news_info->main_news;?>"</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <select name="news_publication_status" class="span4 typeahead" id="typeahead" data-provide="typeahead" style="margin-left: 1.8%;">
                                <option>Please Select One</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="Submit" class="btn btn-primary" name="btn">Edit News</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['news_publication_status'].value = '<?php echo $news_info->news_publication_status; ?>';
</script>