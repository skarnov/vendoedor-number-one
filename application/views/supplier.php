<hr/>
<section id="blog-single">
    <div class="container">
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
</section>