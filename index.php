<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 26.2.2017
 * Time: 15:10
 */

/*
 * Including controller file, where is prepared array with sample names in every case
 */
include ('controller.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>grammCase by Madza91</title>
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>

<table>
    <tr>
        <th>Nominativ</th>
        <th>Genitiv</th>
        <th>Dativ</th>
        <th>Akuzativ</th>
        <th>Vokativ</th>
        <th>Instrumental</th>
        <th>Lokativ</th>
    </tr>

    <?php foreach($results as $name) : ?>
    <tr>
        <td><?php echo $name['nominative']; ?></td>
        <td><?php echo $name['genitive']; ?></td>
        <td><?php echo $name['dative']; ?></td>
        <td><?php echo $name['accusative']; ?></td>
        <td><?php echo $name['vocative']; ?></td>
        <td><?php echo $name['instrumental']; ?></td>
        <td><?php echo $name['locative']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<br>

<form action="" method="post">
    Insert new name:<br>
    <input type="text" name="word" value="" autofocus>
    <input type="submit" name="add" value="Submit">
</form>

<div class="donate_button">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_donations">
        <input type="hidden" name="business" value="madza91@live.com">
        <input type="hidden" name="lc" value="RS">
        <input type="hidden" name="item_name" value="Github project">
        <input type="hidden" name="no_note" value="0">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
</div>

</body>
</html>
