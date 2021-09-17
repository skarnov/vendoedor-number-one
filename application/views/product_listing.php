<script src="<?php echo base_url(); ?>assets/js/pagination.js"></script>        
<script type="text/javascript">
    $(document).ready(function () {
        var show_per_page = 12;
        var number_of_items = $('#content').children().size();
        var number_of_pages = Math.ceil(number_of_items / show_per_page);
        $('#current_page').val(0);
        $('#show_per_page').val(show_per_page);
        var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
        var current_link = 0;
        while (number_of_pages > current_link) {
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
            current_link++;
        }
        navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
        $('#page_navigation').html(navigation_html);
        $('#page_navigation .page_link:first').addClass('active_page');
        $('#content').children().css('display', 'none');
        $('#content').children().slice(0, show_per_page).css('display', 'block');
    });

    function previous()
    {
        new_page = parseInt($('#current_page').val()) - 1;
        if ($('.active_page').prev('.page_link').length == true) {
            go_to_page(new_page);
        }
    }

    function next()
    {
        new_page = parseInt($('#current_page').val()) + 1;
        if ($('.active_page').next('.page_link').length == true) {
            go_to_page(new_page);
        }
    }
    
    function go_to_page(page_num)
    {
        var show_per_page = parseInt($('#show_per_page').val());
        start_from = page_num * show_per_page;
        end_on = start_from + show_per_page;
        $('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
        $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');
        $('#current_page').val(page_num);
    }
</script>
<style>
    #page_navigation a{
        border: 1px solid lime;
	color: black;
	padding: 3px 10px;
	font-size: 12px;
        margin: 0 4px 0 0;
	text-transform: capitalize;
    }
    #page_navigation{
        text-align: center;
        margin-top: 2%;
    }
    .active_page{
        background:red;
    }
</style>
<?php
$total = $this->session->userdata('grand_total');
$company_id = $this->session->userdata('company_id');
?>
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">Product Listing</a></li>
            </ul>
            <div id='content'>
                <?php
                foreach ($product_listing as $v_product) {
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
                                            <div class="brand"><?php echo $v_product->product_summary; ?></div>
                                        </div>
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
                                                        <input name="quantity" readonly="readonly" type="text" name="qty" id="product_buy_quantity<?php echo $v_product->product_id; ?>" value="1" />
                                                        <a class="plus" href="#add"></a>
                                                    </div>
                                                </div>
                                                <div class="price" style="color:red;">Qty <?php echo $v_product->product_quantity; ?> x <?php echo $v_product->product_unit_price; ?> &euro;</span> =  &euro; <?php echo $v_product->product_price; ?></div>
                                            </div>
                                            <!-- END OF COMPANY AND PRODUCT ISSUE-->
                                            <?php
                                            if ($total == NULL && $customer_id != NULL) {
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
                                            } elseif ($v_product->company_id == $company_id) {
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
                                            } elseif ($v_product->company_id != $company_id) {
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
                                            <!-- END OF COMPANY AND PRODUCT ISSUE-->
                                            <?php
                                        }
                                        ?>
                                        <!-- END OF LOGIN FOR PRICE-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div> 
        </div>
    </div>
    <input type='hidden' id='current_page' />
    <input type='hidden' id='show_per_page' />
    <div id='page_navigation'></div>
</div>