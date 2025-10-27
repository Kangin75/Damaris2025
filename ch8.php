<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表變化</title>
    <style>
        table{
            border:1px solid #666;
            padding:5px;
        }
    </style>
</head>
<body>
    <div style="border: 1px solid black;padding:20px;width:fit-content"></div>
</body>
<table>

<?php 
echo "1 x 1 = 1 , ";
echo "1 x 2 = 2 , ";
echo "1 x 3 = 3 , ";
.
.
.
echo "<br>";
echo "2 x 1 = 2 , ";
echo "2 x 2 = 4 , ";
echo "2 x 3 = 6 , ";
.
.
.
echo "<br>";
echo "9 x 1 = 2 , ";
echo "9 x 2 = 18 , ";
echo "9 x 3 = 27 , ";

for($i = 1 ; $i <= 9 ; $i++){
    echo "1 x " . $i . " = " . (1*$i) . " , ";
}
echo "<br>";

for($i = 1 ; $i <= 9 ; $i++){
    echo "1 x " . $i . " = " . (1*$i) . " , ";
}
echo "<br>";
for($i = 1 ; $i <= 9 ; $i++){
    echo "2 x " . $i . " = " . (2*$i) . " , ";
}
echo "<br>";
.
.
.
for($i = 1 ; $i <= 9 ; $i++){
    echo "9 x " . $i . " = " . (9*$i) . " , ";
}
echo "<br>";

// 最終寫法

for($j=1;$j<=9;$j++){

    for($i=1;$i<=9;$i++){

        echo $j . " x " . $i . " = " . ($j*$i) . " , ";

    }
echo "<br>";
}
?>
    
</table>
</html>