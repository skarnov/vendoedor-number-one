<?php
	$subtotal = $this->cart->total();
	$total = $subtotal;
	$grand_total = $total;
	$sdata = array();
	$sdata['grand_total'] = $grand_total;
	$this->session->set_userdata($sdata);
?>
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">Product Listing</a></li>
            </ul>
            <?php
                if ($search_product== NULL) {
            ?>
            <h1 style="color:red;text-align: center;">Sorry, Item not found in our store</h1>
            <?php
            }
            ?>
            <?php
            foreach ($search_product as $v_product) {
            ?>
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <?php
                                if ($v_product->product_discount_percent_status == 1) {
                                ?>
                                <div class="ribbon red"><span><?php echo $v_product->product_discount_percent; ?>% OFF</span></div> 
                                <?php
                                }
                                ?>
                                <div class="image">
                                    <a href="<?php echo base_url(); ?>product/product_details/<?php echo $v_product->product_id; ?>"><img src="<?php echo base_url() . $v_product->product_photo_0; ?>" data-echo="<?php echo base_url() . $v_product->product_photo_0; ?>" style="height: 187px; width: 100%;" /></a>
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="<?php echo base_url(); ?>product/product_details/<?php echo $v_product->product_id; ?>"><?php echo $v_product->product_name; ?></a>
                                    </div>
                                    <div class="brand"><?php echo $v_product->product_summary; ?>y</div>
                                </div>
                                <!--LOGIN FOR PRICE-->
                                    <?php
                                    $customer_id = $this->session->userdata('customer_id');
                                    if (!$customer_id) {
                                    ?>
                                    <div class="prices">
                                        <div class="price"><p class="le-button">Login For Price</p></div>
                                    </div>
                                    <?php
                                    } else {
                                    ?>
                                    <div class="prices">
                                        <p>Quantity:</p> 
                                        <div class="quantity" style="margin-bottom: 3%; margin-top: -17%; margin-left: 40%;">
                                            <div class="le-quantity">
                                                <a class="minus" href="#reduce"></a>
                                                <input name="quantity" readonly="readonly" type="text" name="qty" id="product_buy_quantity<?php echo $v_product->product_id;?>" value="1" />
                                                <a class="plus" href="#add"></a>
                                            </div>
                                        </div>
                                        <div class="price" style="color:red;">Qty <?php echo $v_product->product_quantity; ?> x <?php echo $v_product->product_unit_price; ?> &euro;</span> =  &euro; <?php echo $v_product->product_price; ?></div>
                                    </div>
                                    <!--END OF COMPANY AND PRODUCT ISSUE-->
                                    <?php
                                        if($total == NULL && $customer_id!=NULL){
                                    ?>
                                    <!--CUSTOMER ID HAS-->
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <input type="hidden" value="1" name="qty" id="product_buy_quantity<?php echo $v_product->product_id; ?>" style="width: 116px; margin-right: 3px;" />
                                            <a class="le-button" data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_product->product_id; ?>);">add to cart</a>
                                        </div>
                                    </div>
                                    <!--END OF CUSTOMER HAS ID-->
                                    <?php
                                    }
                                    elseif ($v_product->company_id == $company_id)
                                        {
                                    ?>
                                    <!--IF SAME COMPANY PRODUCT-->
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <input type="hidden" value="1" name="qty" id="product_buy_quantity<?php echo $v_product->product_id; ?>" style="width: 116px; margin-right: 3px;" />
                                            <a class="le-button" data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_product->product_id; ?>);">add to cart</a>
                                        </div>
                                    </div>
                                    <!--END IF SAME COMPANY PRODUCT-->
                                    <?php
                                    }
                                    elseif ($v_product->company_id != $company_id)
                                        {
                                    ?>
                                    <!--COMPANY IS NOT SAME-->
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <input type="hidden" value="1" name="qty" id="product_buy_quantity<?php echo $v_product->product_id; ?>" style="width: 116px; margin-right: 3px;" />
                                            <a class="le-button" data-toggle="modal" data-target="#add_to_cart_failed" onclick="">add to cart</a>
                                        </div>
                                    </div>
                                    <!--END OF COMPANY IS NOT SAME-->
                                    <?php
                                    }
                                    ?>
                                    <!--END OF COMPANY AND PRODUCT ISSUE-->
                                    <?php
                                    }
                                    ?>
                                    <!--END OF LOGIN FOR PRICE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>
</div>