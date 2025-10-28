<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*
        $a = 1; // 最小號碼
        $b = 38; // 最大號碼

        // --- 1. 第一區：選取 6 個不重複的號碼 (範圍 1-38) ---
        define('FIRST_AREA_COUNT', 6);
        define('FIRST_AREA_MAX', 38);

        $first_area_numbers = []; // 儲存第一區號碼的陣列

        // 使用 while 迴圈，直到陣列中的號碼數量達到 6 個為止
        while (count($first_area_numbers) < FIRST_AREA_COUNT) {

            // 產生一個介於 1 到 38 之間的亂數
            $new_number = rand(1, FIRST_AREA_MAX);

            // 檢查新產生的號碼是否已存在於陣列中
            // in_array() 函數用來檢查陣列中是否有重複的資料
            if (!in_array($new_number, $first_area_numbers)) {

                // 如果沒有重複，則將此號碼加入陣列
                $first_area_numbers[] = $new_number;
            }
            // 如果有重複，則 while 迴圈會繼續執行下一輪，直到找到不重複的號碼為止
        }

        // 為了讓輸出更美觀，將號碼排序
        sort($first_area_numbers);


        // --- 2. 第二區：選取 1 個號碼 (範圍 1-8) ---
        define('SECOND_AREA_MAX', 8);
        $second_area_number = rand(1, SECOND_AREA_MAX);


        // --- 3. 輸出結果 ---

        echo "### 💰 威力彩電腦選號結果\n";
        echo "---";

        echo "#### 🔴 第一區 (主號碼：6 個不重複)\n";

        echo "<p style='font-size: 20px; font-weight: bold;'>";
        // 使用 foreach 迴圈印出第一區的 6 個號碼
        foreach ($first_area_numbers as $number) {
            // 使用 str_pad 函式在單一位數前面補 0，例如 5 變成 05
            echo "【" . str_pad($number, 2, "0", STR_PAD_LEFT) . "】 ";
        }
        echo "</p>";

        echo "\n";
        echo "#### 🔵 第二區 (特別號碼：1 個)\n";
        echo "<p style='font-size: 20px; font-weight: bold; color: blue;'>";
        echo "【" . str_pad($second_area_number, 2, "0", STR_PAD_LEFT) . "】";
        echo "</p>";

        echo "\n";
        echo "---";
        echo "✅ **選號邏輯說明：**\n";
        echo "* **第一區**：使用 `while` 迴圈持續產生亂數，並利用 `in_array()` 檢查 `$first_area_numbers` 陣列中是否已存在該號碼，確保不重複。\n";
        echo "* **第二區**：直接使用 `rand(1, 8)` 產生單一號碼。";
    */
    ?>


    <h2>威力彩電腦選號沒有重覆號碼(利用while迴圈)</h2>

    <ul>
        <li>使用亂數函式rand($a,$b)來產生號碼</li>
        <li>將產生的號碼順序存入陣列中</li>
        <li>每次存入陣列中時會先檢查陣列中的資料有沒有重覆</li>
        <li>完成選號後將陣列內容印出</li>
    </ul>

    <?php
    $nums = [];
    while (count($num) <= 6) {
        $tmp = rand(1, 38);
        if (in_array($tmp, $nums)) {
            $nums[] = $tmp;
        }
    }
    //_print_r($nums);
    ?>
    <style>
        .nums div {
            display: inline-block;
            margin: 0 5px;
            width: 36px;
            height: 1px solid #eeee;
            border-radius: 50%;
            text-align: center;
            line-height: 25px;
            background:radial-gradient(circle at 30% 30%, #fdedcaff, #ff9900ff);
            box-shadow:2px 2px 5px #ff9900ff;
        }
    </style>
    <?php
    echo "<div class='nums'>";
    foreach ($nums as $nums) {
        echo "<div>";
        echo $num;
        echo "</div>";
    }
    ?>
echo "產生的隨機號碼是： " . $randomNumber;

    // 假設您已經產生了一組號碼並存入陣列
    $numbers = [$randomNumber];

    // 遞增排序 (由小到大)
    sort($numbers);
    print_r($numbers); // 輸出: Array ( [0] => 1 [1] => 2 [2] => 5 [3] => 8 [4] => 9 )
    
    // 遞減排序 (由大到小)
    $numbers = [$randomNumber]; // 重新設定陣列，以防上次排序的影響
    rsort($numbers);
    print_r($numbers); // 輸出: Array ( [0] => 9 [1] => 8 [2] => 5 [3] => 2 [4] => 1 )
    
    $randomNumber = rand($a, $b);
    $uniqueArr = array_unique($randomNumber);

    if (count($randomNumber) === count($uniqueArr)) {
        echo "數組中無重覆";
    } else {
        echo "數組中有重覆";
    }

    //選號
    $selectedNumbers = [5, 12, 23, 31, 45];

    echo "--- 使用 foreach 輸出 ---";
    foreach ($selectedNumbers as $number) {
        echo $number . "<br>"; // 每個號碼印在一行
    }

</body>

</html>