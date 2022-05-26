<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo __DIR__ . "<br>";
    echo __FILE__ . "<br>";

    echo __LINE__ . "<br>";


    define('MY_CONST', 33.33);
    echo MY_CONST . "<br>";
    ?>
</body>

</html>