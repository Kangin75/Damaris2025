<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
//尋找字元(使用while)

給定一個字串句子
給定一個單字或字母
尋找相符的內容
印出尋找到的單字或字母所在句子中的位置//

<?php
//41
/*
$str="氣象署表示，今天（27日）東北季風影響，桃園以北及東半部地區有局部短暫雨，4縣市大雨特報，其他地區為多雲的天氣，午後中南部山區有局部短暫陣雨，白天南北溫差較大，明天天氣如何？ 氣象署指出，明天（28日） 東北季風影響，北台灣稍涼，其他地區早晚亦涼，本周天氣桃園以北易雨，秋意漸起。";
$search='大雨';
mb_substr();
mb_strlen();
/*
//以下是OPEN AI的寫法
// 初始變數
$pos = 0;      // 從第 0 個字元開始找
$count = 0;    // 紀錄找到的次數

echo "搜尋句子：<br>$str<br><br>";
echo "尋找的字詞：「$search」<br><br>";

// 使用 while 不斷尋找
while (($pos = mb_strpos($str, $search, $pos)) !== false) {
    echo "找到位置：$pos<br>";
    $count++;
    // 下一次搜尋從找到的位置之後繼續
    $pos += mb_strlen($search);
}

// 若沒找到
if ($count == 0) {
    echo "沒有找到「$search」。";
} else {
    echo "<br>共找到 $count 次。";
}

//以下是Gemini的寫法
// 41
$str = "氣象署表示，今天（27日）東北季風影響，桃園以北及東半部地區有局部短暫雨，4縣市大雨特報，其他地區為多雲的天氣，午後中南部山區有局部短暫陣雨，白天南北溫差較大，明天天氣如何？ 氣象署指出，明天（28日） 東北季風影響，北台灣稍涼，其他地區早晚亦涼，本周天氣桃園以北易雨，秋意漸起。";
$search = '大雨';
/
// 初始化變數
$len_str = mb_strlen($str, 'UTF-8');       // Length of the main string
$len_search = mb_strlen($search, 'UTF-8');  // Length of the search string
$position = -1;                            // To store the found position (default to not found)
$i = 0;                                    // Counter for the while loop (starting index)

// The while loop iterates through the main string character by character
// The loop continues as long as the starting index 'i' plus the length of
// the search term is less than or equal to the total length of the string.
// This prevents trying to read beyond the end of the string.
while ($i <= $len_str - $len_search) {
    // Extract a substring of the same length as the search term, starting at index $i
    $current_substr = mb_substr($str, $i, $len_search, 'UTF-8');

    // Check if the extracted substring matches the search term
    if ($current_substr === $search) {
        $position = $i; // Match found! Store the current starting index
        break;          // Exit the while loop immediately
    }

    $i++; // Move to the next character in the main string
}

// Output the result
if ($position !== -1) {
    echo "尋找到的單字或字母： **{$search}**\n";
    echo "所在句子中的位置（從0開始計算）： **{$position}**\n";
    echo "（驗證：從第 {$position} 個字元開始的字串是：**" . mb_substr($str, $position, $len_search, 'UTF-8') . "**）";
} else {
    echo "在句子中找不到單字或字母： **{$search}**";
}
// Note: The built-in function for this is mb_strpos($str, $search, 0, 'UTF-8')
// which would return 38 for this example.

//老師的寫法，先使用for迴圈撰寫
//字串是一種陣列，所以字串在尋找的時候是從0開始找的
//41
/*
$str="氣象署表示，今天（27日）東北季風影響，桃園以北及東半部地區有局部短暫雨，4縣市大雨特報，其他地區為多雲的天氣，午後中南部山區有局部短暫陣雨，白天南北溫差較大，明天天氣如何？ 氣象署指出，明天（28日） 東北季風影響，北台灣稍涼，其他地區早晚亦涼，本周天氣桃園以北易雨，秋意漸起。";
$search='大雨';
mb_substr();
//
mb_strlen();


$pos=-1;
$count=0;

for($i=0;$i<mb_strlen($str)-mb_strlen($search)+1;i++){
    $target=mb_substr($str,$i,mb_strlen($search));
    if ($search==$target) {
        $pos = $i; // 找到了！ 儲存指標位置
        break;          // 找到以後立刻離開for函式，停止迴圈，增加效能
}
    $count++;
}

echo "字串:".$str;
echo "<hr>";
echo "尋找:".$search;
echo "<hr>";

*/
if ($pos >= 0) {
    echo "找到的字串在原字串的第.$pos.的位置";
} else {
    echo "找不到字串" . $search;
}
echo "<hr>";
echo "迴圈次數".$count;


//把以上for迴圈改寫成while迴圈的寫法
//字串是一種陣列，所以字串在尋找的時候是從0開始找的
//41
$str="氣象署表示，今天（27日）東北季風影響，桃園以北及東半部地區有局部短暫雨，4縣市大雨特報，其他地區為多雲的天氣，午後中南部山區有局部短暫陣雨，白天南北溫差較大，明天天氣如何？ 氣象署指出，明天（28日） 東北季風影響，北台灣稍涼，其他地區早晚亦涼，本周天氣桃園以北易雨，秋意漸起。";
$search='大雨';

/*測試用
$search='季風';*/

mb_substr();
//
mb_strlen();

//初始化每個變數的值
$pos=-1;
$count=0;
$i=0;
/*
//當pos=-1，同時count總次數小於時，停止迴圈。不然就繼續往下找
while ($pos==-1 && $count<mb_strlen($str)-mb_strlen($search)+1;i++) {
$target=mb_substr($str,$i,mb_strlen($search));
    if ($search==$target) {
        $pos = $i; // 找到了！ 儲存指標位置
}
    $count++;
}

echo "字串:".$str;
echo "<hr>";
echo "尋找:".$search;
echo "<hr>";

if ($pos >= 0) {
    echo "找到的字串在原字串的第.$pos.的位置";
} else {
    echo "找不到字串" . $search;
}
echo "<hr>";
echo "迴圈次數".$count;

echo"<hr>";
echo"<hr>";

echo mb_strpos($str,$search);
*/

//把以上while的做法嘗試使用do while試試看
/*
do-while 迴圈
執行順序
先判斷條件，再執行迴圈內容
先執行迴圈內容，再判斷條件
1 到N 次（至少執行一次）
當您希望迴圈的內容至少執行一次時，例如在處理使用者輸入或進行初始化時
*/
//字串是一種陣列，所以字串在尋找的時候是從0開始找的
//41
$str="氣象署表示，今天（27日）東北季風影響，桃園以北及東半部地區有局部短暫雨，4縣市大雨特報，其他地區為多雲的天氣，午後中南部山區有局部短暫陣雨，白天南北溫差較大，明天天氣如何？ 氣象署指出，明天（28日） 東北季風影響，北台灣稍涼，其他地區早晚亦涼，本周天氣桃園以北易雨，秋意漸起。";
$search='大雨';

/*測試用
$search='季風';*/

mb_substr();
//
mb_strlen();

//初始化每個變數的值
$pos=-1;
$count=0;
$i=0;

/*
do{
    if ($search==$target) {
        $pos = $i; // 找到了！ 儲存指標位置
        $count++;
}
//當pos=-1，同時count總次數小於時，停止迴圈。不然就繼續往下找
while ($pos==-1 && $count<mb_strlen($str)-mb_strlen($search)+1;i++) {
$target=mb_substr($str,$i,mb_strlen($search);
}
*/

echo "字串:".$str;
echo "<hr>";
echo "尋找:".$search;
echo "<hr>";

if ($pos >= 0) {
    echo "找到的字串在原字串的第.$pos.的位置";
} else {
    echo "找不到字串" . $search;
}
echo "<hr>";
echo "迴圈次數".$count;

?>

</body>
</html>