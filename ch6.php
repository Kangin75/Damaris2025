<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表</title>
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
$numbers = range(1, 9);
$table_output = "";

// 僅使用一層 foreach 迴圈 (對 i 進行迭代)
foreach ($numbers as $i) {
    $row = [];
    
    // 為了生成單行內容，必須再次迭代 $numbers (對 j 進行迭代)
    // 但我們使用內建的 array_map 來取代傳統的 j 迴圈
    $row = array_map(function($j) use ($i) {
        return "{$j}x{$i}=" . ($i * $j);
    }, $numbers);
    
    // 將行內容加入到總輸出字串中
    $table_output .= implode("\t", $row) . "\n";
}

// 一次性印出最終結果
echo $table_output;

?>

    <tr>
        <td>1 x 1 =1</td>
        <td>2 x 1 =2</td>
        <td>3 x 1 =3</td>
        <td>4 x 1 =4</td>
        <td>5 x 1 =5</td>
        <td>6 x 1 =6</td>
        <td>7 x 1 =7</td>
        <td>8 x 1 =8</td>
        <td>9 x 1 =9</td>
    </tr>
    
</table>
</html>