<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Damaris 's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Damaris 's Auto Parts</h1>
    <h2>Order Results</h2>
    <p>Order processed.</p>
<?php
    echo "<p>Order processed at ";
/*呼叫函式 */
    echo date('H:i, js F Y');    
    echo"</p>";
    /*串接運算子改寫成一行
    echo "<p>Order processed at " .date('H:i, js F Y')."</p>"";*/
?>+
</body>
</html>