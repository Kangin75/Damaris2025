<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
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

    <h2>多維陣列</h2>
    <?php
    //指定陣列元素
//姓名
    $name = ['judy', 'amo', 'john', 'peter', 'hebe'];
    //科目
    $subject = ['國文', '英文', '數學', '歷史', '地理'];
    //成績
    $score = [
        [95, 64, 70, 90, 84],//judy成績
        [88, 78, 54, 81, 71],//amo成績
        [45, 60, 68, 70, 62],//john成績
        [59, 32, 77, 54, 42],//peter成績
        [71, 62, 80, 62, 64],//hebe成績
    ];
    print_r($name);
    echo "<br>";
    print_r($subject);
    echo "<br>";
    print_r($score);
    echo "<br>";
    ?>
/*
    <h2>學生多維陣列成績表</h2>
    <table>
        <head>
            <tr><th>姓名</th>
    <?php
                // 表格標題列：科目名稱
                foreach ($subject as $sub) {
                    echo "<th>{$sub}</th>";
                }
            </tr>
/*
        <body>
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
        </tbody>
    </table>
    
</tr>
//
</body>
</html>