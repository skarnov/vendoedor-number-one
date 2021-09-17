<?php
$total = $this->session->userdata('grand_total');
$company_id = $this->session->userdata('company_id');
?>
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">Our Supplier</a></li>
            </ul>
            <?php
            foreach ($all_supplier as $v_supplier) {
                ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="featured">
                        <div class="product-grid-holder">
                            <div class="col-sm-8 col-md-6  no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="image">
                                        <a href="<?php echo base_url(); ?>product/supplier_details/<?php echo $v_supplier->company_id; ?>"><img src="<?php echo base_url() . $v_supplier->company_image; ?>" data-echo="<?php echo base_url() . $v_supplier->company_image; ?>" style="height: 280px; width: 100%;" /></a>
                                    </div>
                                    <div class="body">
                                        <div class="title">
                                            <a href="<?php echo base_url(); ?>product/supplier_details/<?php echo $v_supplier->company_id; ?>"><?php echo $v_supplier->company_name; ?></a>
                                        </div>
                                        <div class="brand"><?php echo $v_supplier->company_email; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>