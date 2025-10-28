<h2>陣列設計練習</h2>

<style>
    table {
        border-collapse: collapse;
    }

    table td {
        padding: 5 10;
        border: 1px solid #ccc;
    }
</style>
<?php


$students = [
    "judy" => [
        "國文" => 95,
        "英文" => 64,
        "數學" => 70,
        "地理" => 90,
        "歷史" => 84
    ],
    "amo" => [
        "國文" => 88,
        "英文" => 78,
        "數學" => 54,
        "地理" => 81,
        "歷史" => 71
    ],
    "john" => [
        "國文" => 45,
        "英文" => 60,
        "數學" => 68,
        "地理" => 70,
        "歷史" => 62
    ],
    "peter" => [
        "國文" => 59,
        "英文" => 32,
        "數學" => 77,
        "地理" => 54,
        "歷史" => 42
    ],
    "hebe" => [
        "國文" => 71,
        "英文" => 62,
        "數學" => 80,
        "地理" => 62,
        "歷史" => 64
    ]
];

?>

<table>
    <tr>
        <td></td>
        <td>國文</td>
        <td>英文</td>
        <td>數學</td>
        <td>地理</td>
        <td>歷史</td>
    </tr>

    <?php
    foreach ($students as $name => $score) {
        echo "<tr>";
        echo "<td>";
        echo $name;
        echo "</td>";
        foreach ($score as $s) {
            echo "<td>";
            echo $s;
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
<h2>多個陣列</h2>
<?php

$students = ["judy", "amo", "john", "peter", "hebe"];
$subjects = ["國文", "英文", "數學", "地理", "歷史"];
$scores = [
    [95, 64, 70, 90, 84],  // judy 的成績
    [88, 78, 54, 81, 71],  // amo
    [45, 60, 68, 70, 62],  // john
    [59, 32, 77, 54, 42],  // peter
    [71, 62, 80, 62, 64]   // hebe
];


echo "<tr><td></td>";
foreach ($subjects as $subject) {
    echo "<td>";
    echo $subject;
    echo "</td>";
}
echo "</tr>";

foreach ($students as $idx => $stu) {
    echo "<tr>";
    echo "<td>";
    echo $stu . $idx;
    echo "</td>";
    foreach ($scores[$idx] as $score) {
        echo "<td>";
        echo $score;
        echo "</td>";
    }

    echo "</tr>";

}

//<h1>利用程式來產生陣列</h1>
// 產生 1 到 9 的數字陣列
$ninetimes = [];

for ($i = 1; $i <= 9; $i++) {

    for ($j = 1; $j <= 9; $j++) {

        $ninetime[] = $j . 'x' . $i . '=' . ($j * $i);
    }

}


echo "<pre>";
print_r($ninetimes);
echo "</pre>";


/*
echo "<pre>";
print_r($ninetimes as nine);
echo "</pre>";
*/

echo "<table>";
foreach ($ninetimes as $nine) {
    if ($idx % 9 == 0) {
        echo "<tr>";
    }
    echo "<td>";
    if ($idx % 9 == 8) {
        echo "</tr>";
    }
}
echo "</table>";

?>
<?php
$ninetimes=[];

for($i=1;$i<=9;$i++){

    for($j=1;$j<=9;$j++){

        $ninetimes[$i][$j]=$j*$i;

    }

}
echo "<pre>";
print_r($ninetimes);
echo "</pre>";


echo "<br>";
echo $ninetimes[7][4];
echo $ninetimes[4][7];
?>
<p>&nbsp</p>;
<p>&nbsp</p>;
<p>&nbsp</p>;
<p>&nbsp</p>;
<p>&nbsp</p>;