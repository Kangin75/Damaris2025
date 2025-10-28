<?php
// === 原始資料 (來自您的圖片) ===

// 學生姓名
$name = ['judy', 'amo', 'john', 'peter', 'hebe'];

// 科目
$subject = ['國文', '英文', '數學', '歷史', '地理'];

// 成績 (多維陣列)
$score = [
    [95, 64, 70, 90, 84], // judy成績
    [88, 78, 54, 81, 71], // amo成績
    [45, 60, 68, 70, 62], // john成績
    [59, 32, 77, 54, 42], // peter成績
    [71, 62, 80, 62, 64]  // hebe成績
];

// === 建立結構化成績資料陣列 ===

$students_data = [];

// 循環遍歷學生姓名陣列
foreach ($name as $student_index => $student_name) {
    // 獲取當前學生的成績陣列
    $current_scores = $score[$student_index];
    
    // 建立一個關聯陣列來存放該學生的 科目 => 成績 數據
    $scores_by_subject = [];
    
    // 循環遍歷科目陣列，同時將成績與科目名稱配對
    foreach ($subject as $subject_index => $subject_name) {
        $scores_by_subject[$subject_name] = $current_scores[$subject_index];
    }
    
    // 將整理好的資料存入最終的 $students_data，鍵為學生姓名
    $students_data[$student_name] = $scores_by_subject;
}

// 輸出整理後的結構化數據（可選）
echo "<h2>結構化學生資料 (print_r):</h2>";
echo "<pre>";
print_r($students_data);
echo "</pre>";

/*
整理後的 $students_data 結構如下：
[
    "judy" => [
        "國文" => 95, 
        "英文" => 64, 
        // ... 其他科目
    ],
    "amo" => [
        "國文" => 88, 
        "英文" => 78, 
        // ... 其他科目
    ],
    // ... 其他學生
]
*/

// === 建立 HTML 表格來顯示成績資料 ===
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>學生成績表格</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .name {
            text-align: left;
        }
    </style>
</head>
<body>

    <h2>學生多維陣列成績表</h2>

    <table>
        <head>
            <tr>
                <th>姓名</th>
                <?php
                // 表格標題列：科目名稱
                foreach ($subject as $sub) {
                    echo "<th>{$sub}</th>";
                }
                ?>
            </tr>
        </head>
        <body>
            <?php
            // 數據列：學生成績
            foreach ($students_data as $student_name => $scores) {
                echo "<tr>";
                echo "<td class='name'>{$student_name}</td>"; // 學生姓名
                
                // 學生各科成績
                foreach ($scores as $score_value) {
                    echo "<td>{$score_value}</td>";
                }
                echo "</tr>";
            }
            ?>
        </body>
    </table>

</body>
</html>