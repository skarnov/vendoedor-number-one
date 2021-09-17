<div class="row-fluid">
    <div class="span12">
        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Advertise</h4>
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
                        <thead>
                            <tr>
                                <th>
                                    Advertise Image			  
                                </th>
                                <th>
                                    Advertise Link
                                </th>
                                <th>
                                    Advertise Place
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_advertise as $v_advertise) {
                                ?>
                                <tr>
                                    <td><img src="<?php echo base_url() . $v_advertise->advertise_image; ?>" style="height:50px; width:50px;" /></td>
                                    <td><?php echo $v_advertise->advertise_link; ?></td>
                                    <td>
                                        <span class="label label-important label-mini">
                                            <?php
                                                if ($v_advertise->advertise_place == '1')
                                                {
                                                    echo 'Home Page';
                                                }

                                                if ($v_advertise->advertise_place == '2')
                                                {
                                                    echo 'About Page Top';
                                                }

                                                if ($v_advertise->advertise_place == '3')
                                                {
                                                    echo 'About Page Bottom';
                                                }

                                                if ($v_advertise->advertise_place == '4')
                                                {
                                                    echo 'Login Page Top';
                                                }

                                                if ($v_advertise->advertise_place == '5')
                                                {
                                                    echo 'Login Page Bottom';
                                                }

                                                if ($v_advertise->advertise_place == '6')
                                                {
                                                    echo 'Registration Page Top';
                                                }

                                                if ($v_advertise->advertise_place == '7')
                                                {
                                                    echo 'Registration Page Bottom';
                                                }

                                                if ($v_advertise->advertise_place == '8')
                                                {
                                                    echo 'Shopping Cart Page';
                                                }
                                                
                                                if ($v_advertise->advertise_place == '9')
                                                {
                                                    echo 'Product Listing Page';
                                                }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class='activation_color'>
                                            <?php
                                            if ($v_advertise->advertise_publication_status == '1') {
                                                echo 'Published';
                                            }
                                            ?> 
                                            <div id='color'>    
                                                <?php
                                                if ($v_advertise->advertise_publication_status == '0') {
                                                    echo 'Unpublished';
                                                }
                                                ?> 
                                            </div>    
                                        </div> 
                                    </td>                          
                                    <td class="center">
                                        <?php
                                        if ($v_advertise->advertise_publication_status == '1') {
                                            ?>
                                            <a class="btn btn-inverse" href="<?php echo base_url(); ?>super_admin/unpublished_advertise/<?php echo $v_advertise->advertise_id; ?>" title="Unpublish" onclick="return check_unpublish();">
                                                <i class="icon-remove"></i>  
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn btn-success" href="<?php echo base_url(); ?>super_admin/published_advertise/<?php echo $v_advertise->advertise_id; ?>" title="Publish" onclick="return check_publish();">
                                                <i class="icon-ok"></i>  
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <a class="btn btn-info" href="<?php echo base_url(); ?>super_admin/edit_advertise/<?php echo $v_advertise->advertise_id; ?>" title="Edit">
                                            <i class="icon-edit icon-white"></i>  
                                        </a>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>super_admin/delete_advertise/<?php echo $v_advertise->advertise_id; ?>" title="Delete" onclick="return check_delete();">
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