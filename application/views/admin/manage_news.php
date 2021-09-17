<div class="row-fluid">
    <div class="span12">
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage News</h4>
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
                                    News Title			  
                                </th>
                                <th>
                                    Main News			  
                                </th>
                                <th>
                                    Created Time			  
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
                                foreach($all_news as $v_news)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_news->news_title;?></td>
                                <td><?php echo $v_news->main_news;?></td>
                                <td><?php echo $v_news->news_date_time;?></td>
                                <td>
                                    <div class='activation_color'>
                                        <?php 
                                            if($v_news->news_publication_status=='1')
                                            {
                                                echo 'Published';
                                            }
                                        ?> 
                                        <div id='color'>    
                                            <?php 
                                                if($v_news->news_publication_status=='0')
                                                {
                                                    echo 'Unpublished';
                                                }
                                            ?> 
                                        </div>    
                                    </div>   
                                </td>
                                <td class="center">
                                    <?php if($v_news->news_publication_status=='1')
                                        {
                                    ?>
                                    <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/unpublished_news/<?php echo $v_news->news_id;?>" title="Unpublish" onclick="return check_unpublish();">
                                        <i class="icon-remove"> </i>  
                                    </a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <a class="btn btn-success" href="<?php echo base_url();?>super_admin/published_news/<?php echo $v_news->news_id;?>" title="Publish" onclick="return check_publish();">
                                        <i class="icon-ok"> </i>  
                                    </a>
                                    <?php
                                        }
                                    ?>
                                    <a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_news/<?php echo $v_news->news_id;?>" title="Edit">
                                        <i class="icon-edit icon-white"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_news/<?php echo $v_news->news_id;?>" title="Delete" onclick="return check_delete();">
                                        <i class="icon-trash icon-white"> </i> 
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>