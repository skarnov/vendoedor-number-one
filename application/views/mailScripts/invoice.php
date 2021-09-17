<!DOCTYPE html>

<html>
    <head>
        <title>Vendedor Number One Invoice</title>
    </head>

    <body style="margin: 0px 25px;">
        <table style="width:100%">
            <tr>
                <td width="58%" style="color:black; font-size:18px">Invoice ID: <?php echo '#INV' . '' . $customer_info->customer_id; ?> </td>
                <td width="42%" style="color: red; font-size: 22px; ">Vendedor Number One</span></em></td>
            </tr>
            <tr>
                <td>
                    <p style="color:blue; font-size:10px">
                        Mundo Espontâneo,
                        Adress - Rua Neves Ferreira Nº7 4Eº 1170-273
                        Nº Contributor - 513467009,
                        E-Mail: info@vdn1.com, Call : +351 - 915217259
                    </p>
                </td>
            </tr>	
        </table>
        <table style="width:100%">
            <tr>
                <td colspan="2" style="color:red; font-size:14px" >Customer Info</td>
            </tr>
            <tr>
                <td width="8%" style="color:black; font-size:9px">Name:</td>
                <td width="50%" style="color:black; font-size:9px"><?php echo $customer_info->customer_name; ?></td>
            </tr>
            <tr>
                <td width="8%" style="color:black; font-size:9px">Contributor Number:</td>
                <td width="50%" style="color:black; font-size:9px"><?php echo $customer_info->contributor_number; ?></td>
            </tr>
            <tr>
                <td style="color:black; font-size:9px">Email: </td>
                <td style="color:black; font-size:9px"><?php echo $customer_info->customer_email; ?></td>
            </tr>
            <tr>
                <td style="color:black; font-size:9px">Phone: </td>
                <td style="color:black; font-size:9px"><?php echo $customer_info->customer_phone; ?></td>
            </tr>
            <tr>
                <td style="color:black; font-size:9px">Full Address:</td>
                <td style="color:black; font-size:9px"><?php echo $customer_info->customer_address; ?></td>
            </tr>
            <tr>
                <td style="color:black; font-size:9px">Country:</td>
                <td style="color:black; font-size:9px"><?php echo $customer_info->customer_country; ?></td>
            </tr>
            <tr>
                <td height="20" style="color:black; font-size:9px">Member Since:</td>
                <td style="color:black; font-size:9px"><?php echo $customer_info->member_since; ?></td>
                <td style="color:black; font-size:9px">&nbsp;</td>
                <td style="color:black; font-size:9px">&nbsp;</td>
            </tr>	
        </table>
        <table style="width:100%">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <table style="border-collapse: collapse; border: 1px solid black; width:100%">
            <tr>
                <td style="border: 1px solid black;">Product ID</td>
                <td style="border: 1px solid black;">Product Name</td>
                <td style="border: 1px solid black;">Description</td>		
                <td style="border: 1px solid black;">Quantity</td>
                <td style="border: 1px solid black;">Price</td>
                <td style="border: 1px solid black;">Subtotal</td>
            </tr>
            <?php
            $contents = $this->cart->contents();
            foreach ($contents as $cart_value) {
                ?>
                <tr>
                    <td style="border: 1px solid black;">#V1<?php echo $cart_value['id']; ?></td>
                    <td style="border: 1px solid black;"><?php echo $cart_value['name']; ?></td>
                    <td style="border: 1px solid black;"><?php echo $cart_value['description']; ?></td>		
                    <td style="border: 1px solid black;"><?php echo $cart_value['qty']; ?></td>
                    <td style="border: 1px solid black;">&euro; <?php echo $cart_value['price']; ?></td>
                    <td style="border: 1px solid black;"><strong>&euro; <?php echo $cart_value['subtotal']; ?></strong></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div>
            <h2>Total: <?php echo $this->cart->total(); ?> &euro;</h2>
        </div>
    </body>
</html>