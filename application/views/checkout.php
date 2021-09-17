<section id="cart-page" style="margin-top: 5%;">
    <div class="container">
        <!-- CONTENT -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
            <?php
                $rows = count($this->cart->contents());
                if($rows==NULL){
                    echo '<h1>Your Shopping Cart is empty</h1>';
                    echo '<h4>For ordering our product please add the cart product first</h4>';
                }
                else{
                    echo "<h1>You have $rows product to order. For checkout, press the checkout button</h1>";
                }
            ?>
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
                            if ($total==NULL){
                        ?>
                        <a href=""></a>
                        <?php  
                            }
                            else{
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