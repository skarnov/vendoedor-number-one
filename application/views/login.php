<!-- MAIN -->
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Login</h2>
                    <p>Hello, Welcome to your account</p>
                    <form action="<?php echo base_url() ?>user_administrator/customer_login_check" method="POST" role="form" class="login-form cf-style-1">
                        <h3 style="color:red">
                            <?php
                            $exc = $this->session->userdata('exception');
                            if (isset($exc)) {
                                echo $exc;
                                $this->session->unset_userdata('exception');
                            }
                            ?>
                        </h3>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <div class="field-row">
                            <label>Email</label>
                            <input type="email" required name="customer_email" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Password</label>
                            <input type="password" required name="customer_password" class="le-input">
                        </div>
                        <div class="field-row clearfix">
                            <span class="pull-left">
                                <label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
                            </span>
                            <span class="pull-right">
                                <a href="#" class="content-color bold">Forgotten Password ?</a>
                            </span>
                        </div>
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Secure Login</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="col-md-6">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Create New Account</h2>
                    <p>Create your own VDN1 customer account</p>
                    <div class="buttons-holder">
                        <a href="<?php echo base_url() ?>product/signup" class="le-button huge">Sign Up</a>
                    </div>
                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>
                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</main>
<!-- MAIN : END -->	
