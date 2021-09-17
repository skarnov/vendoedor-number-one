<div class="row-fluid">
    <div class="span12">
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Orders</h4>
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
                                <th>
                                    Actions
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_order as $v_all_order)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_all_order->customer_name;?></td>
                                <td><?php echo $v_all_order->order_total;?></td>
                                <td class="center"><?php echo $v_all_order->order_date_time;?></td>
                                <td class="center">
                                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_order/<?php echo $v_all_order->order_id;?>" title="Delete" onclick="return check_delete();">
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