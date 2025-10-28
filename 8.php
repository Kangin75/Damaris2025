<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

/*找閏年*/
$leap[];
for($i=2025;$i<2524;$i++){
    if($i % 4 ==0 && $i %100 !=0 || $i % 400 == 0) {
    $leap[] = $i;
}
}
 
/*
echo "<pre>";
print_r($leap);
echo "</pre>";
*/
/*
echo "$leap[130]";
echo $i "==>" $leap[];
*/
?>
<?php

// 1. 宣告一個空陣列來儲存乘法表的結果
$multiplication_table = [];

// 2. 使用巢狀迴圈 (Nested Loops) 產生九九乘法表
// $i 代表被乘數 (Multiplicand)
for ($i = 1; $i <= 9; $i++) {
    // $j 代表乘數 (Multiplier)
    for ($j = 1; $j <= 9; $j++) {
        
        // 計算結果
        $result = $i * $j;
        
        // 格式化成字串 e.g., "1 x 2 = 2"
        // 使用 sprintf 確保格式整齊，例如單位數前面補空格
        $formula_string = sprintf("%d x %d = %d", $i, $j, $result);
        
        // 將字串結果存入陣列
        $multiplication_table[] = $formula_string;
    }
}

// --- 分隔線 ---

// 3. 使用迴圈將陣列內容印出
echo "### 🔢 九九乘法表（儲存於陣列後印出）\n";
echo "<pre>"; // 使用 <pre> 標籤保持格式整齊

// 使用 foreach 迴圈遍歷陣列中的每一個元素
foreach ($multiplication_table as $index => $formula) {
    
    // 為了讓輸出更像乘法表，每九個項目後換行
    if (($index + 1) % 9 == 1 && $index != 0) {
        echo "\n"; // 輸出換行
    }
    
    // 輸出公式，並在後面加上兩個空格以便於閱讀
    echo str_pad($formula, 12, " ", STR_PAD_RIGHT) . "  ";
}

echo "</pre>";

// --- 額外資訊 ---
echo "---";
echo "#### 📝 陣列資訊";
echo "* **總共項目數：** " . count($multiplication_table) . " 個 (9x9=81)";
// 如果您想看陣列的完整結構 (用於除錯):
/*
echo "<pre>";
print_r($multiplication_table);
echo "</pre>";
*/
?>
</body>
</html>

