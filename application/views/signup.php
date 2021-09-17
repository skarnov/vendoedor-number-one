<!-- MAIN -->
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Login</h2>
                    <p>Hello, Welcome to your account</p>
                    <form action="<?php echo base_url(); ?>user_manager/save_customer" method="POST" role="form" class="login-form cf-style-1">
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <div class="field-row">
                            <label>Name</label>
                            <input type="text" required name="customer_name" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Contributor Number</label>
                            <input type="text" required name="contributor_number" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Email</label>
                            <input type="email" required name="customer_email" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Phone</label>
                            <input type="number" required name="customer_phone" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Password</label>
                            <input type="password" required name="customer_password" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Conform Password</label>
                            <input type="password" required name="conform_password" class="le-input">
                        </div>
                        <div class="field-row">
                            <label>Address</label>
                            <textarea name="customer_address" class="le-input"></textarea>
                        </div>
                        <div class="field-row">
                            <label>Country</label>
                            <input type="text" required name="customer_country" class="le-input">
                        </div>
                        <div class="field-row clearfix">
                            <span class="pull-left">
                                <label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"><span class="bold"> i have read the <a href="">terms and conditions</a> and i agree</span></label>
                            </span>
                        </div>
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Secure Sign In</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="col-md-6">
                <section class="section register inner-left-xs">
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