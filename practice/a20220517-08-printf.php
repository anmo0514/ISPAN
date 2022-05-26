<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>


    <table>
        <?php for ($i = 0; $i < 16; $i++) { ?>
            <tr>
                <td style="background-color:#0000<?php printf("%X%X", $i, $i) ?>"></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>