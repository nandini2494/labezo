<!DOCTYPE HTML>
<html>
    <body>
        <?php foreach ($data as $coupon_data) { ?>
        <p>Coupon <?php echo $coupon_data['set_coupon']['coupon_code'] ?> is Available for <?php if($coupon_data['set_coupon']['type'] == 'Fixed') { echo "Flat ". "$".$coupon_data['set_coupon']['amount']. " discount";} else {echo $coupon_data['set_coupon']['amount']. "% discount";} ?> valid from <?php echo $coupon_data['set_coupon']['to_date'] ?> to <?php echo $coupon_data['set_coupon']['from_date'] ?></p>
        <?php } ?>   
    </body>
</html>