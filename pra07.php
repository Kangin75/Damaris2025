<h2>陣列練習-閏年與天干地支</h2>
<?php



$leap=[];
for($i=2025;$i<2524;$i++){
    if (($i % 4 == 0 && $i % 100 != 0) || $i % 400 == 0) {
        $leap[]=$i;
    }
}

echo "<pre>";
print_r($leap);
echo "</pre>";

$leap2=[];
for($i=2025;$i<2524;$i++){
    if (($i % 4 == 0 && $i % 100 != 0) || $i % 400 == 0) {
        $leap2[$i]=1;
    }
}
echo in_array(2029,$leap);


?>
<h2>威力彩電腦選號沒有重覆號碼(利用while迴圈)</h2>

<ul>
    <li>使用亂數函式rand($a,$b)來產生號碼</li>
    <li>將產生的號碼順序存入陣列中</li>
    <li>每次存入陣列中時會先檢查陣列中的資料有沒有重覆</li>
    <li>完成選號後將陣列內容印出</li>
</ul>
<?php 
$nums=[];
while(count($nums)<6){
    $tmp=rand(1,38);
    if(!in_array($tmp,$nums)){
        $nums[]=$tmp;
    }
}
//print_r($nums);

?>
<style>

    /* background: 50%/cover no-repeat url(../images/bg/ball.svg);
    border-radius: 50px;
    display: block;
    font-size: 16px;
    font-weight: 700;
    height: 34px;
    letter-spacing: 1px;
    line-height: 34px;
    width: 34px */

.nums div{
    display:inline-block;
    margin: 0 5px;
    width: 28px;
    height:28px;
    border:1px solid #eeee;
    border-radius:50%;
    text-align:center;
    line-height:28px;
    background:radial-gradient(circle at 30% 30%, #fdedcaff, #ff9900ff);
    box-shadow:2px 2px 5px #ff9900ff;
} 
</style>
<?php 
echo "<div class='nums'>";
foreach($nums as $num){
    echo "<div>";
    echo $num;
    echo "</div>";
}
echo "</div>";
?>
<h2>已知西元2025年為乙已年，請設計一支程式，可以接受任一西元年份，輸出對應的天干地支的年別。(利用迴圈)</h2>

<ul>
    <li>天干：甲乙丙丁戊己庚辛壬癸</li>
    <li>地支：子丑寅卯辰巳午未申酉戌亥</li>
    <li>天干地支配對：甲子、乙丑、丙寅….甲戌、乙亥、丙子….</li>
</ul>
<?php 
$sky=[ "甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"];
$land=[ "子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];
$sl=[];

for($i=0; $i<count($sky); $i++){
    $pos=$i;
    for($j=0; $j<count($land);$j++){
        if($i%2==0 && $j %2==0){
            $sl[$pos]=$sky[$i] . $land[$j];
            $pos=$pos+10;
        }else if($i%2==1 && $j %2 ==1){
            $sl[$pos]=$sky[$i] . $land[$j];
            $pos=$pos+10;
        }
    }

}
ksort($sl);

echo "<pre>";
print_r($sl);
echo "</pre>";
?>
<h2>簡單解法</h2>
<?php
$tiangan = ["甲","乙","丙","丁","戊","己","庚","辛","壬","癸"];
$dizhi  = ["子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥"];

$ganzhi = []; // 存放 60 組結果的陣列

for ($i = 0; $i < 60; $i++) {
    $tg = $tiangan[$i % 10];   // 天干循環
    $dz = $dizhi[$i % 12];     // 地支循環
    $ganzhi[] = $tg . $dz;
}

// 顯示結果
print_r($ganzhi);
?>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>