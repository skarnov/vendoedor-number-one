<section id="cart-page" style="margin-top: 5%;">
    <div class="container">
        <!-- CONTENT -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
            <?php
            $contents = $this->cart->contents();
            foreach ($contents as $v_contents) {
                ?>
                <div class="row no-margin cart-item">
                    <div class="col-xs-12 col-sm-2 no-margin">
                        <a href="#" class="thumb-holder">
                            <img class="lazy" alt="" src="<?php echo base_url() . $v_contents['image']; ?>" />
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-5 ">
                        <div class="title">
                            <a href="#"><?php echo $v_contents['name']; ?></a>
                        </div>
                        <div class="brand"><?php echo $v_contents['description']; ?></div>
                    </div>
                    <div class="col-xs-12 col-sm-3 no-margin">
                        <form action="<?php echo base_url(); ?>cart/update_cart" method="POST">
                            <input type="number" name="product_quantity" value="<?php echo $v_contents['qty']; ?>" style="border: 4px solid red; padding: 3%; width: 32%;" />
                            <input type="hidden"  value="<?php echo $v_contents['rowid']; ?>" name="rowid"/>
                            <input type="submit" value="Update" class="color_dark" style="border: 4px solid red; width: 37%; padding: 3%; text-align: center;"><br/>
                        </form>
                    </div>
                    <?php
                    $company_id = $v_contents['company_id'];
                    ?>
                    <div class="col-xs-12 col-sm-2 no-margin">
                        <div class="price">
                            &euro;<?php echo $v_contents['subtotal']; ?>
                        </div>
                        <a class="close-btn" href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>"></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- CONTENT : END  -->
        <?php
        $subtotal = $this->cart->total();
        $total = $subtotal;
        $grand_total = $total;
        $sdata = array();
        $sdata['grand_total'] = $grand_total;
        $this->session->set_userdata($sdata);
        ?>
        <!-- SIDEBAR -->
        <div class="col-xs-12 col-md-3 no-margin sidebar ">
            <div class="widget cart-summary">
                <h1 class="border">shopping cart</h1>
                <div class="body">
                    <ul class="tabled-data no-border inverse-bold">
                        <li>
                            <label>cart subtotal</label>
                            <div class="value pull-right">&euro; <?php echo $total; ?></div>
                        </li>
                        <li>
                            <label>shipping</label>
                            <div class="value pull-right">free shipping</div>
                        </li>
                        <li>
                            <label>tax</label>
                            <div class="value pull-right">include tax</div>
                        </li>
                    </ul>
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>order total</label>
                            <div class="value pull-right">&euro; <?php echo $total; ?></div>
                        </li>
                    </ul>
                    <div class="buttons-holder">
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
                        <a class="simple-link block" href="<?php echo base_url(); ?>">continue shopping</a>
                    </div>
                </div>
            </div>
            <div id="cupon-widget" class="widget">
                <h1 class="border">use coupon</h1>
                <div class="body">
                    <form>
                        <div class="inline-input">
                            <input data-placeholder="enter coupon code" type="text" />
                            <button class="le-button" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- SIDEBAR : END  -->
    </div>
</section>