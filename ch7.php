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
// 產生 1 到 9 的數字陣列
$numbers = range(1, 9);
$output_array = [];

// 結合兩個陣列，建立一個包含所有 i 和 j 組合的平面陣列
foreach ($numbers as $i) {
    foreach ($numbers as $j) {
        // 儲存每個算式，並標記行尾 (例如 i=9)
        $output_array[] = [
            'i' => $i, 
            'j' => $j, 
            'is_eol' => ($j === 9) // 判斷是否為行尾
        ];
    }
}

// 使用 array_reduce 將扁平陣列轉換成格式化的字串
$final_string = array_reduce($output_array, function($carry, $item) {
    // 生成算式字串
    $equation = "{$item['j']}x{$item['i']}=" . ($item['i'] * $item['j']);
    
    // 判斷是否為行尾，如果是則換行，否則加入 tab
    $carry .= $equation;
    $carry .= $item['is_eol'] ? "\n" : "\t";
    
    return $carry;
}, "");

echo $final_string;
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