<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列</title>
</head>
<body>
<?php

$a=[1,2,3,4,5,6,7];
print_r($a);
echo "<br>";

$b=['小明','阿三','小美','大頭'];

print_r($b);

echo "<br>";
$c=['國文'=>'89','數學'=>'75','英文'=>'64'];

print_r($c);
echo "<br>";
//印出陣列，注意陣列起始是以0開始計算
//print_r($a);
//echo "<br>";
//echo $a[3];
//echo "<br>";
//echo $b[1];
//echo "<br>";
//echo $c[0];


//key,index

//除了用數字也可以用文字當成key的名稱key value
$d=[1=>"A",
  2=>"B",
  3=>"C",
'姓名'=>'廖岫湘'];

print_r($d);
echo "<br>";

//沒有特別指定鍵值，會以數字為優先
$e=["A","B","C"];
print_r($e);

//印出陣列，注意陣列起始是以0開始計算
print_r($d);
echo "<br>";
echo $d[3];
echo "<br>";
echo $d['姓名'];
echo "<br>";
echo $e[0];
?>
</body>
</html>