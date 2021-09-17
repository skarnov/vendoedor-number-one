<?php
$total = $this->session->userdata('grand_total');
$company_id = $this->session->userdata('company_id');
?>
<div id="single-product" style="margin-top:4%">
    <div class="container">
        <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <!--IMAGE ALERT BOX-->
            <div class="modal fade" id="fullimage" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <img src="<?php echo base_url() . $product_detail->product_photo_0; ?>" style="width: 898px; height: 568px;" />
                    </div>
                </div>
            </div>
            <!--END OF IMAGE ALERT BOX-->
            <a href="#" data-toggle="modal" data-target="#fullimage"><img src="<?php echo base_url() . $product_detail->product_photo_0; ?>" /></a>
        </div>
        <div class="no-margin col-xs-12 col-sm-7 body-holder">
            <div class="body">
                <div class="title"><a href="#"><?php echo $product_detail->product_name; ?></a></div>
                <div class="excerpt">
                    <p><?php echo $product_detail->product_summary; ?></p>
                    <p>Manufacture: <?php echo $product_detail->product_manufacture; ?></p>
                    <p>Code: #V1<?php echo $product_detail->product_id; ?></p>
                    <p>Weight: <?php echo $product_detail->product_weight; ?></p>
                </div>
                <div class="prices">
                    <!-- LOGIN FOR PRICE-->
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
                                    <input name="quantity" readonly="readonly" type="text" name="qty" id="product_buy_quantity<?php echo $product_detail->product_id; ?>" value="1" />
                                    <a class="plus" href="#add"></a>
                                </div>
                            </div>
                            <div class="price" style="color: red; margin-top: 13%; margin-bottom: 3%;">Qty <?php echo $product_detail->product_quantity; ?> x <?php echo $product_detail->product_unit_price; ?> &euro;</span> =  &euro; <?php echo $product_detail->product_price; ?></div>
                        </div>
                        <!-- END OF COMPANY AND PRODUCT ISSUE-->
                        <?php
                        if ($total == NULL && $customer_id != NULL) {
                            ?>
                            <!--CUSTOMER ID HAS-->
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <input type="hidden" value="1" name="qty" id="product_buy_quantity<?php echo $product_detail->product_id; ?>" style="width: 116px; margin-right: 3px;" />
                                    <a class="le-button" data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $product_detail->product_id; ?>);">add to cart</a>
                                </div>
                            </div>
                            <!--END OF CUSTOMER HAS ID-->
                            <?php
                        } elseif ($product_detail->company_id == $company_id) {
                            ?>
                            <!--IF SAME COMPANY PRODUCT-->
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <input type="hidden" value="1" name="qty" id="product_buy_quantity<?php echo $product_detail->product_id; ?>" style="width: 116px; margin-right: 3px;" />
                                    <a class="le-button" data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $product_detail->product_id; ?>);">add to cart</a>
                                </div>
                            </div>
                            <!--END IF SAME COMPANY PRODUCT-->
                            <?php
                        } elseif ($product_detail->company_id != $company_id) {
                            ?>
                            <!--COMPANY IS NOT SAME-->
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <input type="hidden" value="1" name="qty" id="product_buy_quantity<?php echo $product_detail->product_id; ?>" style="width: 116px; margin-right: 3px;" />
                                    <a class="le-button" data-toggle="modal" data-target="#add_to_cart_failed" onclick="">add to cart</a>
                                </div>
                            </div>
                            <!--END OF COMPANY IS NOT SAME-->
                            <?php
                        }
                        ?>
                        <!-- END OF COMPANY AND PRODUCT ISSUE-->
                        <?php
                    }
                    ?>
                    <!-- END OF LOGIN FOR PRICE-->
                </div>
            </div>
        </div>
    </div>
    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder" style="margin-top:10%">
                <ul class="nav nav-tabs simple" >
                    <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <p><?php echo $product_detail->product_description; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>