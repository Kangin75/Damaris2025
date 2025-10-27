<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三角型範例</title>
</head>

<body>
    <h2>直角三角型</h2>
    <?php
    //直角三角形
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo " ";
        }
        echo "<br>";
    }
    ?>

    <h2>直角三角型變成倒直角三角型</h2>
    <?php
    for ($i = 0; $i < 5; $i++) {
        for ($j = 5; $j > $i; $j--) {
            echo " ";
        }
        echo "<br>";
    }
    ?>

    <h2>正三角型</h2>
    <?php
    for ($i = 0; $i < 5; $i++) {

        for ($k = 0; $k < 4 - $i; $k++) {
            echo "&nbsp";
        }

        for ($j = 5; $j < 2 * $i + 1; $j++) {
            echo "*";
        }
        echo "<br>";

    }

    ?>
    &nbsp;&nbsp;&nbsp;?&nbsp;*<br>
    &nbsp;&nbsp;&nbsp;***<br>
    &nbsp;&nbsp;*****<br>
    &nbsp;*******<br>
    *********<br>

    <h2>正三角型變成倒正三角型</h2>
    <h2>倒三角形</h2>
    <?php
    for ($i = 0; $i < 5; $i++) {

        // 印出前面的空白
        for ($k = 0; $k < $i; $k++) {
            echo "&nbsp;&nbsp;";
        }

        // 印出星號
        for ($j = 0; $j < 2 * (4 - $i) + 1; $j++) {
            echo "*";
        }

        // 換行
        echo "<br>";
    }
    ?>

    <h2>矩形</h2>
    <?php
    for ($i = 0; $i < 7; $i++) {        // 外層迴圈：控制列數
        for ($j = 0; $j < 7; $j++) {    // 內層迴圈：控制每列的星號數量
            echo "*";             // 每次輸出一個星號
        }
        echo "<br>";              // 換行
    }

    //矩形挖空效果迴圈邏輯如下
//i==0 !! i == 6
//j==0 !! j == 6
    
    for ($i = 0; $i < 7; $i++) {        // 外層迴圈：控制列數
        for ($j = 0; $j < 7; $j++) {    // 內層迴圈：控制每列的星號數量
            if (i == 0 || i == 6 || j == 0 || j == 6) {
                echo "*";             // 每次輸出一個星號
            }
        }
        echo "&nbsp;*";              // 輸出空白
    }

    ?>


    <h2>菱形</h2>
    <?php
    //菱形
    $rows = 5; // 控制菱形上半部的高度
    
    // 上半部（正三角形）
    for ($i = 0; $i < $rows; $i++) {
        for ($k = 0; $k < $rows - 1 - $i; $k++) {
            echo "&nbsp;&nbsp;";
        }
        for ($j = 0; $j < 2 * $i + 1; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    // 下半部（倒三角形）
    for ($i = $rows - 2; $i >= 0; $i--) {
        for ($k = 0; $k < $rows - 1 - $i; $k++) {
            echo "&nbsp;&nbsp;";
        }
        for ($j = 0; $j < 2 * $i + 1; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>

    <h2>使用 floor() 印出菱形</h2>
    <?php
    $n = 9; // 總行數（建議使用奇數）
    
    $mid = floor($n / 2); // 中間行（floor 確保整數）
    
    for ($i = 0; $i < $n; $i++) {
        // 計算每一行要印的星星數量
        if ($i <= $mid) {
            // 上半部
            $stars = 2 * $i + 1;
        } else {
            // 下半部
            $stars = 2 * ($n - $i - 1) + 1;
        }

        // 計算前面的空白數量
        $spaces = abs($mid - $i);

        // 印出空白
        for ($k = 0; $k < $spaces; $k++) {
            echo "&nbsp;&nbsp;";
        }

        // 印出星星
        for ($j = 0; $j < $stars; $j++) {
            echo "*";
        }

        echo "<br>";
    }
    ?>

    <h2>使用 floor() 印出菱形</h2>
    <?php
    //老師寫法
    
    $x = 9; // 行數（使用奇數）
    $y = 0; //
    
    $mid = floor($x / 2); // 中間行（floor 確保整數）
    
    for ($i = 0; $i < $x; $i++) {
        if ($i > floor($x / 2)) {
            $y = $y - 1;
        }
        echo $i . "_" . $y;

        // 計算前面的空白數量
        $spaces = abs($mid - $i);

        // 印出空白
        for ($k = 0; $k < $x - 1 - $i; $k++) {
            echo "&nbsp;";
        }

        // 印出星星
        for ($j = 0; $j < 2 * $i + 1; $j++) {
            echo "*";
        }

        echo "<br>";
    }
    ?>

    <h2>使用 floor() 印出菱形</h2>
    <?php
    //老師寫法
    
    $x = 10; // 行數（居然是偶數）
    $y = 0; //
    
    for ($i = 0; $i < $x; $i++) {
        if ($i > floor($x / 2)) {
            $y = $y - 1;
        } else {
            $y = $i;
        }
        //  echo $i."_".$y;
    
        // 印出空白
        for ($k = 0; $k < floor($x / 2); $k++) {
            echo "&nbsp;";
        }
        // 印出星星
        for ($j = 0; $j < 2 * $y + 1; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>
<?php
<h2>矩形－對角線</h2>
<?php
for ($i = 0; $i < 7; $i++) {
    for ($j = 0; $j < 7; $j++) {
        if ($i == 0 || $i == 6 || $j == 0 || $j == 6 || $i == $j || $i + $j == 6) {
            echo "*";
        } else {
            echo "&nbsp;&nbsp;"; // 多一個 &nbsp; 讓間距對齊
        }
    }
    echo "<br>";
}
?>
</body>


</html>
