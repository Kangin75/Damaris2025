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
/*
方案一：使用 array_map 結合 range 和匿名函式 (推薦)
這個方法是最「函數式編程」的寫法，它避免了顯式的 for 或 while 迴圈。
*/
// 1. 產生 1 到 9 的數字範圍陣列
$numbers = range(1, 9);

// 2. 使用 array_map 迭代乘數 (i)
$multiplication_table = array_map(function($i) use ($numbers) {
    // 3. 在每個乘數 i 的內部，再次使用 array_map 迭代被乘數 (j)
    //    並計算 i * j 的結果字串
    $row = array_map(function($j) use ($i) {
        // 格式化輸出：j x i = (i*j)
        return "{$j}x{$i}=" . ($i * $j);
    }, $numbers);
    
    // 4. 使用 implode 將單行結果串接起來，並加上換行符號
    return implode("\t", $row) . "\n";
}, $numbers);

// 5. 一次性印出整個陣列的內容
echo implode("", $multiplication_table);
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