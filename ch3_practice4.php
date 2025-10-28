<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>使用for迴圈來產生以下的數列</h2>

<ul>
    <li>1,3,5,7,9……n</li>
    <li>10,20,30,40,50,60……n</li>
    <li>3,5,7,11,13,17……97</li>
</ul>
<hr>
<?php
$n=10;
for($i=1;$i<$n;$i=$i+2){
    echo $i . ",";
}

echo "<hr>";

$n=8;
for($i=1;$i<$n;$i=$i+1){
    echo $i *10 . ",";
}

$n=8;
for($i=1;$i<$n;$i=$i+1){
    echo $i *10 . ",";
}

$n=8;
for($i=1;$i<$n;$i=$i+1){
    echo $i *10 . ",";
}
echo "<hr>";

$total=0;
for($j=1;$j<=100;$j=$j+2){
    $n=$j;
    $count=0;
    $prime=true;
    for($i=2;$i<(int)sqrt($n);$i++){
        $count++;
        $total++;
        if($n%$i==0){
            $prime=false;
            break;
        }
    }
    if($prime==true){
        echo $n .',';
    }

}

echo "<hr>";
echo "一共執行了".$total.'次回圈';
$total=0;
for($j=1;$j<=100;$j=$j+2){
    $n=$j;
    $count=0;
    $prime=true;
    for($i=2;$i<(int)sqrt($n);$i++){
        $count++;
        $total++;
        if($n%$i==0){
            $prime=false;
            break;
        }
    }
    if($prime==true){
        echo $n .'是質數';
        echo "==>";
        echo '一共判斷了'.$count.'次<br>';
    }

}

echo "<hr>";
echo "一共執行了".$total.'次回圈';


/*第一個數列1,3,5,7,9……n*/
for($i=1;$i<=n; $i=$i+2){
    echo $i . ",";
    }
/*第二個數列10,20,30,40,50,60……n*/
for($i=10;$i<=n; $i=$i+1){
    echo $i*10 . ",";
    } 
/*從 3 到 100 的所有質數。
    2~(x-1)
    2~99，要跑98次，但是不需要跑到98次啦*/
?>
</body>
</html>