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
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
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

</body>
</html>
