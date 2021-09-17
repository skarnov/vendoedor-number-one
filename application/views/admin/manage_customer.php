<div class="row-fluid">
    <div class="span12">
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Customer</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <table class='table table-striped' style='margin-bottom:0; font-size: 10px;'>
                        <thead>
                            <tr>
                                <th>
                                    Customer Name:			  
                                </th>
                                <th>
                                    E-Mail Address:
                                </th>
                                <th>
                                    Address:
                                </th>
                                <th>
                                    Contributor Number:
                                </th>
                                <th>
                                    Mobile:
                                </th>
                                <th>
                                    Current Status
                                </th>
                                <th>
                                    Action
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_customer as $v_customer)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_customer->customer_name;?></td>
                                <td><?php echo $v_customer->customer_email;?></td>
                                <td><?php echo $v_customer->customer_address;?></td>
                                <td><?php echo $v_customer->contributor_number;?></td>
                                <td><?php echo $v_customer->customer_phone;?></td>
                                <td>
                                    <div class='activation_color'>
                                        <?php 
                                            if($v_customer->customer_activation_status=='1')
                                            {
                                                echo 'Active';
                                            }
                                        ?> 
                                        <div id='color'>    
                                            <?php 
                                                if($v_customer->customer_activation_status=='0')
                                                {
                                                    echo 'Inctive';
                                                }
                                            ?> 
                                        </div>    
                                    </div> 
                                </td>                          
                                <td>
                                    <?php if($v_customer->customer_activation_status=='1')
                                        {
                                    ?>
                                    <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/disable_customer/<?php echo $v_customer->customer_id;?>" title="Inactive" onclick="return check_unpublish();">
                                        <i class="icon-remove"> Inactive</i>  
                                    </a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <a class="btn btn-success" href="<?php echo base_url();?>super_admin/enable_customer/<?php echo $v_customer->customer_id;?>" title="Active" onclick="return check_publish();">
                                        <i class="icon-ok"> Active</i>  
                                    </a>
                                    <?php
                                        }
                                    ?>
                                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_customer/<?php echo $v_customer->customer_id;?>" title="Delete" onclick="return check_delete();">
                                        <i class="icon-trash icon-white"> Delete</i> 
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