<?php
    srand(mktime(0, 0, 0));
    $time = rand( 0, time() );
    echo date("H:i:s", $time);
?>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
let x = Math.random() * 10;
Console.log(X);

</script>
</body>
</html> -->