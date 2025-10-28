<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Ctrl + shift +p -->
    <?php
    $sky = ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "葵"];
    $land = ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];
    $sl = [];


    for ($j = 0; $j < count($land); $j++) {
        if ($i % 2 == 0 && $j % 2 == 0) {
            $s1[$pos] = $sky[$i] . $land[$j];
            $pos = $pos + 10;
        } elseif ($i % 2 == 1 && $j % 2 == 1) {
            $s1[$pos] = $sky[$i] . $land[$j];
        }
    $pos=$pos+10;
    }
    echo "<pre>";
    print_r($s1);
    echo "</pre>";
    //    $sl[] = $sky[] . $land[];
    
    ?>
<?php

/**
 * 計算並輸出指定西元年份對應的干支紀年。
 *
 * @param int $year 任意西元年份。
 * @return string 對應的干支紀年，例如 '甲子'。
 */
function calculateGanzhiYear(int $year): string {
    
    // 1. 定義天干和地支的陣列
    // 天干 (10 個)
    $heavenlyStems = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'];
    // 地支 (12 個)
    $earthlyBranches = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'];

    // 2. 基準點：已知西元 1024 年為甲子年 (天干索引 0, 地支索引 0)
    $baseYear = 1024;

    // 3. 計算給定年份與基準年份的差距
    $difference = $year - $baseYear;

    // 4. 利用取餘數（模擬迴圈週期性）計算天干和地支的索引

    // PHP 的 % 運算對於負數的處理：
    // 例如：-1 % 10 = -1。這與數學上的模運算定義略有不同，
    // 如果 difference 是負數，我們需要手動將其轉換為正向索引。

    // 計算天干索引 (10 年週期)
    $stemIndex = $difference % 10;
    // 如果結果為負，則加上 10 (實現正向循環)
    if ($stemIndex < 0) {
        $stemIndex += 10;
    }

    // 計算地支索引 (12 年週期)
    $branchIndex = $difference % 12;
    // 如果結果為負，則加上 12 (實現正向循環)
    if ($branchIndex < 0) {
        $branchIndex += 12;
    }

    // 5. 取得對應的干支名稱並組合
    $gan = $heavenlyStems[$stemIndex];
    $zhi = $earthlyBranches[$branchIndex];

    $resultGanzhi = $gan . $zhi;

    // 輸出結果
    echo "西元 {$year} 年對應的干支年別為：{$resultGanzhi}\n";
    
    return $resultGanzhi;
}

// --- 範例測試 ---

echo "--- 測試現代年份 ---\n";
// 2024 年（甲辰）
calculateGanzhiYear(2024);

// 2025 年（乙巳）
calculateGanzhiYear(2025);

// 2023 年（癸卯）
calculateGanzhiYear(2023);

echo "\n--- 測試基準點與週期 ---\n";
// 基準年 1024 年 (甲子)
calculateGanzhiYear(1024);

// 往後 60 年，一個週期 (甲子)
calculateGanzhiYear(1084);

// 往前 1 年 (癸亥)
calculateGanzhiYear(1023); 

echo "\n--- 測試古代年份 ---\n";
// 西元 1 年 (辛酉)
calculateGanzhiYear(1);

?>
</body>

</html>