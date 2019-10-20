<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>perpetual</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <style>
    *{
      margin:0; /*消除所有標籤的內距和外邊距 */
      padding:0;
      box-sizing:border-box; /*調整所有的標籤的大小不受padding設置影響 */
    }
    body{
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(to right, #2c3e50, #3498db);
        height:100vh;  /*設定BODY本身寬高都為滿版*/
        width:100vw;
        display:flex;  /*使用flex排版並設定元素置中 */
        align-items:center;
        justify-content:center;
    }
    table{
        border-collapse: collapse;
    }
    td{
        width: 85px;
        height: 65px;
        text-align: center;
    }
    #main{
        min-width: 950px;  /*使用min-width可以確保main的寬度不會因為瀏灠器變化而變小*/
        height: 600px;
        background: white;
        border-radius: 1%;
        /* margin: auto; */
        /* margin-top: 100px; */
        position:relative;
        /* margin-top: 100px; */
        position:relative;
        filter: drop-shadow(2px 2px 20px black);
    }
    #left{
        width: 300px;
        height: 600px;
        background-image: url(taipei.jpg);
        border-radius: 1% 0px 0px 1%;
        background-size: cover;
        color: white;
        padding-top: 20px;
        padding-left: 20px;
        box-sizing: border-box;
        position: absolute;
        top: 0px;
        left: 0px;
    }
    #right{
        width: 650px;
        height: 600px;
        background: white;
        border-radius: 0px 1% 1% 0px;
        padding-top: 45px;
        box-sizing: border-box;
        text-align: center;
        position: absolute;
        top: 0px;
        right: 0px;
    }
    #top{
        width: 100%;
        height: 12%;
        font-size: 30px;
        color: rgb(75,75,75);
        display:flex;
        justify-content:space-between; /*讓元素間自動分配空白*/
        padding:0 25%; /*利用padding來控制TOP裏的空間*/
        align-items:center; /*元素垂直置中*/
        box-sizing:border-box;  /*讓元素的大小不受padding設定的影響*/
    }
    #top a{
      display:flex;  /*讓top裏的 a 標籤自動調整高度到和圖片一樣30x30 */
    }
    #bottom{
        width: 100%;
        height: 88%;
        margin-left: 15px;
    }
    #holiday>td:first-child{
        color: #ef8e38;
    }
    #holiday>td:last-child{
        color: #56ab2f;
    }
    .fonta{
        font-size: 33px;
        filter: drop-shadow(1px 1px 1px gray);
    }
    .fontb{
        font-size: 18px;
        filter: drop-shadow(1px 1px 1px gray);
    }
    .fontc{
        font-size: 125px;
        filter: drop-shadow(1px 1px 1px gray);
    }
    .line{
        border-bottom:1px solid gray;
    }
    .light{
        color: rgb(150,150,150);
        font-size: 8px;
    }
    </style>
</head>
<body>

<?php
if(!empty($_GET['year'])){
    $year=$_GET['year'];
}else{
    $year=date("Y");
}
if(!empty($_GET['month'])){
    $month=$_GET['month'];
}else{
    $month=date("m");
}
?>
<div id=main>
<?php
$today=date("Y-m-d");
$tdd=date("d");
$TDD=date("l");
$start="$year-$month-01";
$startday=date("w",strtotime($start));
$days=date("t",strtotime($start));
$endday=date("w",strtotime($year-$month-$days));
$MONTH=date("F");
$monthcap=date("F",strtotime($start));
$sd=[
    1=>[1=>"元旦"],
    2=>[14=>"西洋情人節",28=>"和平紀念日"],
    3=>[8=>"婦女節",14=>"白色情人節"],
    4=>[1=>"復活節",4=>"兒童節",5=>"清明節"],
    5=>[1=>"勞動節"],
    6=>[7=>"端午節"],
    9=>[13=>"中秋節",28=>"教師節"],
    10=>[10=>"雙十節",25=>"台灣光復節"],
    12=>[25=>"聖誕節"],
];
?>

    <div id=left>
        <?php
            echo "<div class='fontc'>".$tdd."</div>";
            echo "<div class='fonta'>"."&nbsp;".$TDD."</div>";
            echo "<div class='fontb'>"."&nbsp;&nbsp;&nbsp;".$MONTH.",".$year."</div>";
        ?>
    </div>

    <div id=right>

        <div id=top>
            <?php
            if($month-1>0){
            ?>
                <a href="?year=<?=$year;?>&month=<?=($month-1);?>"><img src="arrow01.png" width=30px height=30px></a>
            <?php
            }else{
            ?>
                <a href="?year=<?=($year-1);?>&month=<?=12;?>"><img src="arrow01.png" width=30px height=30px></a>
            <?php
            }
            ?>

            <?=$monthcap?>, <?=$year?>

            <?php
            if($month+1<13){
            ?>
                <a href="?year=<?=$year;?>&month=<?=($month+1);?>"><img src="arrow02.png" width=30px height=30px></a>
            <?php
            }else{
            ?>
                <a href="?year=<?=($year+1);?>&month=<?=1;?>"><img src="arrow02.png" width=30px height=30px></a>
            <?php
            }
            ?>
        </div>

        <div id="bottom">
            <table>
                <tr id=holiday>
                    <td class=line>SUN</td>
                    <td class=line>MON</td>
                    <td class=line>TUE</td>
                    <td class=line>WED</td>
                    <td class=line>THU</td>
                    <td class=line>FRI</td>
                    <td class=line>SAT</td>
                </tr>
                <?php
                for($i=0;$i<=5;$i++){
                    echo "<tr id=holiday>";
                    for($j=0;$j<=6;$j++){

                        if(!empty($sd[$month][$i*7+$j+1-$startday])){
                            $str=$sd[$month][$i*7+$j+1-$startday];
                        }else{
                            $str="&nbsp;";
                        }

                        if($i==0 && $j<$startday){
                            echo "<td></td>";
                        }elseif(($i*7+$j+1-$startday)>$days){
                            echo "<td></td>";
                        }else{
                            echo "<td>".($i*7+$j+1-$startday)."<br>"."<div class=light>".$str."</div>"."</td>";
                        }

                    }
                    echo "</tr>";
                }
                
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>