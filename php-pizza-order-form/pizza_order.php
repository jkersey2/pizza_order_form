/*
Jeff R Kersey
PIZZA ORDER FORM
*/

<!DOCTYPE html>
<html lang="en"><title>Pizza Order</title>
<head><meta charset="utf-8" />
<style>.container{margin-left: 20px;}</style>
</head><body>

<h1>Pizza order details</h1>

<?php

if (isset($_POST['submit'])) {
    $total = 0;
    $custName = $_POST['name'];
    $custAddy = $_POST['address'];
    $pieSize = $_POST['size'];

    if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['password'])) {
        echo  "Name, address, or password was omitted";
    }

    if ($pieSize == '10') {
        $myPie = "10 inch pizza";
        $pieCost = 6;
    } elseif ($pieSize == '14') {
        $myPie = "14 inch pizza";
        $pieCost = 10;
    } elseif ($pieSize == '18') {
        $myPie = "18 inch pizza";
        $pieCost = 14;
    }

    if (isset($_POST["toppings"])) {
        $myTops = implode(", ", $_POST["toppings"]);
        $topTotal = sizeof($_POST["toppings"]);
    }

    if (!isset($_POST["toppings"])) {
        $myTops = "cheese only";
        $topTotal = 0;
    }

    $delCharge = ($_POST['radio']);

    if ($delCharge == 5) {
        $orderType = "delivery";
    } else {
        $orderType = "Pickup, no extra charge";
    }

    $total = $pieCost + $topTotal + $delCharge;
}

?>
<div class=".container">
<table>
<tr>
    <td>Name: </td><td><?php echo($custName . "<br />\n");?></td>
</tr>
<tr>
    <td>Address: </td><td><?php echo($custAddy . "<br />\n");?></td>
</tr>
<tr>
    <td>Size: </td><td><?php echo($myPie . "<br />\n");?></td>
</tr>
<tr>
    <td>Toppings: </td><td><?php echo($myTops . "<br />\n");?></td>
</tr>
<tr>
    <td>Total: </td><td><?php echo(" $" . "$total" ."<br />\n");?></td>
</tr>
<tr>
    <td>Pickup or delivery: </td><td><?php echo($orderType);?></td>
</tr>
<br>
</table>
</div>
<h4>Thank you for your business!</h4>
</body>
</html>
