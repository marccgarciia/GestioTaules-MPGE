<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/reload.js"></script>
</head>
<body>
<?php
require "../modal/mesa.php";
$array=Mesa::getAllBySalaId(1);

foreach ($array as $mesas){
 var_dump($mesas);
}


?>
</body>
</html>


