<?php
$total = $this->session->userdata('grand_total');
$company_id = $this->session->userdata('company_id');
?>
<div id="single-product" style="margin-top:4%">
    <div class="container">
        <div class="col-xs-4">
            <img src="<?php echo base_url() . $supplier_detail->company_image; ?>" style="height: 250px;" />
        </div>
        <div class="col-xs-4">
            <div class="body">
                <div class="title"><a href="#"><?php echo $supplier_detail->company_name; ?></a></div>
                <div class="excerpt">
                    <p><?php echo $supplier_detail->company_email; ?></p>
                    <p><?php echo $supplier_detail->company_description; ?></p>
                </div>
            </div>
        </div>
        <div class="col-xs-4 sidemenu-holder">
            <!-- SIDE NAVIGATION : START -->	
            <div class="side-menu animate-dropdown">
                <div class="head"><i class="fa fa-list"></i> <?php echo $supplier_detail->company_name; ?> categories</div>        
                <nav class="yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">
                        <?php
                        foreach ($supplier_category as $v_category) {
                            ?>
                            <li class="dropdown menu-item">
                                <?php
                                foreach ($all_company as $v_company)
                                    ?>
                                <a href="<?php echo base_url(); ?>product/product_listing/<?php echo $v_company->company_name; ?>/<?php echo $v_category->category_id; ?>" style="text-transform: capitalize;" > <?php echo $v_category->category_name; ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- SIDE NAVIGATION : END -->	
        </div>
    </div>
</div>