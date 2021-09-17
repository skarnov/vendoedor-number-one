<div class="row-fluid">
    <div class="span12">
        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Product Search</h4>
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
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <form action="<?php echo base_url() ?>super_admin/search" method="POST">
                            <div class="search">
                                <input type="text" name="text" class="form-control" placeholder="Search Products" />
                                <button type="submit" class="btn btn-primary" style="margin-top: -1%;height: 31px;">Search</button>
                            </div>
                        </form>
                        <br/>
                        <thead>
                            <tr>
                                <th>
                                    Name			  
                                </th>
                                <th>
                                    Company
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    ID
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
                            foreach ($search_product as $v_product) {
                                ?>
                                <tr>
                                    <td><?php echo $v_product->product_name; ?></td>
                                    <td><?php echo $v_product->company_name; ?></td>
                                    <td><?php echo $v_product->category_name; ?></td>
                                    <td><img src="<?php echo base_url() . $v_product->product_photo_0; ?>" style="height:50px; width:50px;" /></td>
                                    <td>&euro; <?php echo $v_product->product_price; ?></td>
                                    <td>#V1<?php echo $v_product->product_id; ?></td>
                                    <td>
                                        <div class='activation_color'>
                                            <?php
                                            if ($v_product->product_publication_status == '1') {
                                                echo 'Published';
                                            }
                                            ?> 
                                            <div id='color'>    
                                                <?php
                                                if ($v_product->product_publication_status == '0') {
                                                    echo 'Unpublished';
                                                }
                                                ?> 
                                            </div>    
                                        </div>   
                                    </td>
                                    <td class="center">
                                        <?php
                                        if ($v_product->product_publication_status == '1') {
                                            ?>
                                            <a class="btn btn-inverse" href="<?php echo base_url(); ?>super_admin/unpublished_product/<?php echo $v_product->product_id; ?>" title="Unpublish" onclick="return check_unpublish();">
                                                <i class="icon-remove"></i>  
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn btn-success" href="<?php echo base_url(); ?>super_admin/published_product/<?php echo $v_product->product_id; ?>" title="Publish" onclick="return check_publish();">
                                                <i class="icon-ok"></i>  
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <a class="btn btn-info" href="<?php echo base_url(); ?>super_admin/edit_product/<?php echo $v_product->product_id; ?>" title="Edit">
                                            <i class="icon-edit icon-white"></i>  
                                        </a>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>super_admin/delete_product/<?php echo $v_product->product_id; ?>" title="Delete" onclick="return check_delete();">
                                            <i class="icon-trash icon-white"></i> 
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