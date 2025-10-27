<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生成績等級評比練習</title>
</head>
<body>
<?php 

$s =null;

$score = $s;
/*
$score = isset($_GET['s']) ? (int)$_GET['s'] : 0;
*/
$test;
$level;

if($score>=60){
    $test='及格';
}else if{
    $test='不及格';
}else if($score<0 || $score>100){
    echo "分數錯誤，請重新輸入"
}
/*
if($score<=59){
    echo $level="E";
    exit();
}if($score<=69){
    echo $level="D";
    exit();
    }
}if($score<=79){
    $level="C";
    exit();
    }
}if($score<=89){
     $level="B";
     exit();
    }
}if($score<=100){
    $level="A";
    exit();
    }
    else if($score<0 || $score>100){
    echo "分數錯誤，請重新輸入"
}
*/

if($score>0 && $score<=59){
    $level="E";
}else if($score>=60 && $score<=69){
    $level="D";
}else if($score>=70 && $score<=79){
    $level="C";
}else if($score>=80 && $score<=89){
    $level="B";

}else if($score>=90 && $score<=100){
    $level="A";

}else{
    
}

switch($level){
    case "A";
    echo "表現優異，請繼續保持";
    break;
    case "B";
    echo "表現優異，請繼續保持";
    break;
     case "C";
    echo "表現優異，請繼續保持";
    break;
    case "D";
    echo "表現優異，請繼續保持";
    break;
    default;
    echo "是否無心學業?";
}

echo"您的成績為:"$score;
echo"您的等級為:"$level;
echo"您的成績是否及格:"$test;

?>
</body>
</html>