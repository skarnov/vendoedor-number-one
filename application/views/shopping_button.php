<?php
$subtotal = $this->cart->total();
$total = $subtotal;
$grand_total = $total;
$sdata = array();
$sdata['grand_total'] = $grand_total;
$this->session->set_userdata($sdata);
?>
<div class="top-cart-holder dropdown animate-dropdown" >
    <div class="basket">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <div class="basket-item-count">
                <span class="count"><?php echo $rows = count($this->cart->contents()); ?></span>
                <img src="<?php echo base_url() ?>assets/images/icon-cart.png" alt="" />
            </div>
            <div class="total-price-basket"> 
                <span class="lbl">your cart:</span>
                <span class="total-price">
                    <span class="sign">&euro;</span><span class="value"><?php echo $total; ?></span>
                </span>
            </div>
        </a>
        <ul class="dropdown-menu">
            <?php
            $contents = $this->cart->contents();
            foreach ($contents as $v_contents) {
                ?>
                <li>
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                <div class="thumb">
                                    <img alt="" src="<?php echo base_url() . $v_contents['image']; ?>" />
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 no-margin">
                                <div class="title">&nbsp; &nbsp;<?php echo $v_contents['name']; ?></div>
                                <div class="price">&nbsp; &nbsp; &euro;<?php echo $v_contents['subtotal']; ?></div>
                            </div>
                        </div>
                        <a class="close-btn" href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>"></a>
                    </div>
                </li>
            <?php } ?>
            <li class="checkout">
                <div class="basket-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <a href="<?php echo base_url(); ?>cart/show_cart" class="le-button inverse">View cart</a>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?php
                            if ($total == NULL) {
                                ?>
                                <a href=""></a>
                                <?php
                            } else {
                                ?>
                                <a class="le-button big" href="<?php echo base_url() ?>checkout">checkout</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>