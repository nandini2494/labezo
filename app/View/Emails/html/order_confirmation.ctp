<!DOCTYPE HTML>
<html>
    <body>
        <table style="max-width:720px; width:100%; margin: 0 auto;">
            <?php foreach ($data['order'] as $order) { ?>
            <tr>
                <td colspan="3"><h2><b>Product Name</b></h2></td>                
            </tr>
            <tr>
                <td colspan="3" style="border-bottom: 1px solid #000;"></td>
            </tr>
            <tr>
                <td colspan = "3" style = "text-align:center">
                <h3>Success - your order is confirmed!</h3>
                <h4>Order number: <?php echo $order['product_order']['order_id'] ?></h4>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border-bottom: 1px solid #000;"></td>
            </tr>
            <tr>
                <td style = "padding-top: 1em;"><strong>Shipping Address:</strong></td>
                <td style="text-align: right; padding-top: 1em;"><strong>Billing Address:</strong></td>
            </tr>
            <tr>
                <td><?php echo $order['shipping_address']['firstname'] ?> <?php echo $order['shipping_address']['lastname'] ?></td>
                <td style="text-align: right;"><?php echo $order['buyer_register']['firstname'] ?> <?php echo $order['buyer_register']['lastname'] ?></td>
            </tr>
            <tr>
                <td><?php echo $order['shipping_address']['email'] ?></td>
                <td style="text-align: right;"><?php echo $order['buyer_register']['email'] ?></td>
            </tr>
            <tr>
                <td><?php echo $order['shipping_address']['mobile'] ?></td>
                <td style="text-align: right;"><?php echo $order['buyer_register']['phone'] ?></td>
            </tr>
            <tr>
                <td><?php echo $order['shipping_address']['address1'] ?></td>
                <td style="text-align: right;"><?php echo $order['buyer_register']['address'] ?></td>
            </tr>
            <tr>
                <td><?php echo $order['shipping_address']['city'] ?>, <?php echo $order['shipping_address']['state'] ?>, <?php echo $order['shipping_address']['country'] ?> (<?php echo $order['shipping_address']['postal_code'] ?>)</td>
                <td style="text-align: right;"><?php echo $order['buyer_register']['city'] ?>, <?php echo $order['buyer_register']['state'] ?>, <?php echo $order['buyer_register']['country'] ?> (<?php echo $order['buyer_register']['pin_code'] ?>)</td>
            </tr>
            <tr>
                <td colspan = "3">
                    <table style = "border: 0px solid transparent; background: #f1f1f1; width: 100%; margin-top: 1.5em;">
                        <thead>
                            <tr>
                                <td style = "padding: 1em;"><strong>Product Name</strong></td> 
                                <td style = "padding: 1em;"></td>
                                <td style = "padding: 1em; float:right"><strong>Price</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border-bottom: 1px solid #000;"></td>
                             </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; foreach ($data['order_detail'] as $order_detail) { ?>
                            <tr>
                                <td style = "padding: 1em;"><?php echo $order_detail['product_order']['product_name'] ?></td>
                                <td style = "padding: 1em;"></td>
                                <td style = "padding: 1em; float:right;">$<?php echo number_format($order_detail['product_order']['amount'],2) ?></td>
                                <?php $total += $order_detail['product_order']['amount'] ?>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td style = "padding: 1em;"></td>
                                <td style = "padding: 1em;"><strong>Total</strong></td>
                                <td style = "float:right; padding: 1em;">$<?php echo number_format($total,2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php } ?>
        </table>    
    </body>
</html>