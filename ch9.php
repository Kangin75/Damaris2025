<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表變化輸出結果放入一個九乘九的表格中</title>
    <style>
        table{
            border:1px solid #666;
            padding:5px;
        }
    </style>
</head>
<body>
    <div style="border: 1px solid black;padding:20px;width:fit-content"></div>
</body>
<table>

<?php 

// 九九乘法表變化輸出結果放入一個九乘九的表格中

for($i=1;$i<=10;$i++){
    echo "<tr>"
    for($j=1;$j<=10;$j++){
        if($i=-1 && j==1){
        echo"<td>";
        echo"</td>";
        }else if($i==1){
        echo"<td>";
        echo $j-1;
        echo"</td>";
        }else if($j==1){
        echo"<td>";
        echo $i-1;
        echo"</td>";
        }else{
        echo"<td>";
        echo ($j-1)*($i-1);
        echo"</td>";
        }
        echo"</tr>";

    }
echo "<br>";
}
?>
<div style="border:1px solid black;padding:20px;width:fit-content">
<table>
    <tr>
        <td>1 x 1 =1</td>
        <td>2 x 1 =2</td>
        <td>3 x 1 =3</td>
        <td>4 x 1 =4</td>
        <td>5 x 1 =5</td>
        <td>6 x 1 =6</td>
        <td>7 x 1 =7</td>
        <td>8 x 1 =8</td>
        <td>9 x 1 =9</td>
    </tr>
    <tr>
        <td>1 x 2 =2</td>
        <td>2 x 2 =4</td>
        <td>3 x 2 =6</td>
        <td>4 x 2 =8</td>
        <td>5 x 2 =10</td>
        <td>6 x 2 =12</td>
        <td>7 x 2 =14</td>
        <td>8 x 2 =16</td>
        <td>9 x 2 =18</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>   
</div> 

</html>