<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN CHART PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> New Orders</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <thead>
                            <tr>
                            	<th>
                                    Customer Name
                                </th>
                                <th>
                                    Order Total
                                </th>
                                <th>
                                    Order Date & Time
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_order as $v_all_order) {
                                ?>
                                <tr>
                                    <td><?php echo $v_all_order->customer_name;?></td>
                                    <td><?php echo $v_all_order->order_total; ?></td>
                                    <td class="center"><?php echo $v_all_order->order_date_time; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END CHART PORTLET-->
    </div>
    <div class="span6">
        <!-- BEGIN CHART PORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"> </i> New Customer</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <thead>
                            <tr>
                            	<th>
                                    Customer Name
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
                            foreach ($all_customer as $v_customer) {
                                ?>
                                <tr>
                                    <td><?php echo $v_customer->customer_name;?></td>
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
                </div>
            </div>
        </div>
    </div>
</div>