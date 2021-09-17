<div class="row-fluid">
    <div class="span12">
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Category</h4>
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
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <thead>
                            <tr>
                                <th>
                                    Company Name			  
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Publication Status
                                </th>
                                <th>
                                    Action
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_category as $v_category)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_category->company_name;?></td>
                                <td><?php echo $v_category->category_name;?></td>
                                <td>
                                    <div class='activation_color'>
                                        <?php 
                                            if($v_category->category_publication_status=='1')
                                            {
                                                echo 'Published';
                                            }
                                        ?> 
                                        <div id='color'>    
                                            <?php 
                                                if($v_category->category_publication_status=='0')
                                                {
                                                    echo 'Unpublished';
                                                }
                                            ?> 
                                        </div>    
                                    </div>   
                                </td>
                                <td class="center">
                                    <?php if($v_category->category_publication_status=='1')
                                        {
                                    ?>
                                    <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/unpublished_category/<?php echo $v_category->category_id;?>" title="Unpublish" onclick="return check_unpublish();">
                                        <i class="icon-remove"> </i>  
                                    </a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <a class="btn btn-success" href="<?php echo base_url();?>super_admin/published_category/<?php echo $v_category->category_id;?>" title="Publish" onclick="return check_publish();">
                                        <i class="icon-ok"> </i>  
                                    </a>
                                    <?php
                                        }
                                    ?>
                                    <a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_category/<?php echo $v_category->category_id;?>" title="Edit">
                                        <i class="icon-edit icon-white"> </i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_category/<?php echo $v_category->category_id;?>" title="Delete" onclick="return check_delete();">
                                        <i class="icon-trash icon-white"> </i> 
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div style="color:lime; margin-top:1%">
 			<?php echo $this->pagination->create_links();?>
 		    </div>
                </div>
            </div>
        </div>
    </div>
</div>