<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>perpetual</title>
    <style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body{
        font-family: 'Courier New', Courier, monospace;
        background: #f8f2d9;
        background-image:url(background.png);
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-size: 30px;
    }
    table{
        border-collapse: collapse;
    }
    td{
        width: 105px;
        height:80px;
        text-align: center;
    }
    #main{
        width: 1200px;
        height: 850px;
        position: fixed;
        top: 140px;
        left: 500px;
    }
    #left{
        width: 1060px;
        height: 780px;
        background-image:url(bg-calender.png);
        position: absolute;
        top: 0px;
        left: 0px;
        padding-top:50px;
        padding-left:30px;
        box-sizing: border-box;
        filter: drop-shadow(5px 5px 5px gray);
    }
    #right{
        width:440px;
        height:480px;
        background-image:url(bg-bar.png);
        position:absolute;
        top: -150px;
        right: 0px;
        color: #5F4B3A;
        padding-top: 160px;
        padding-left: -30x;
        box-sizing: border-box;
        text-align: center;
        filter: drop-shadow(5px 5px 5px gray);
    }
    #top{
        width: 100%;
        height: 12%;
        font-size: 36px;
        color: rgb(75,75,75);
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
        font-size: 36px;
    }
    .fontb{
        font-size: 150px;
        font-weight: bolder;
    }
    .line{
        border-bottom:3px dashed #5F4B3A;
    }
    .light{
        color: rgb(150,150,150);
        font-size: 18px;
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

        <div id=top> 
            <?php
            if($month-1>0){
            ?>
                <a href="perpetual02.php?year=<?=$year;?>&month=<?=($month-1);?>"><img src="garrow.png" width=30px height=30px></a>
            <?php
            }else{
            ?>
                <a href="perpetual02.php?year=<?=($year-1);?>&month=<?=12;?>"><img src="garrow.png" width=30px height=30px></a>
            <?php
            }
            ?>

            <?=$monthcap?>, <?=$year?>

            <?php
            if($month+1<13){
            ?>
                <a href="perpetual02.php?year=<?=$year;?>&month=<?=($month+1);?>"><img src="garrow2.png" width=30px height=30px></a>
            <?php
            }else{
            ?>
                <a href="perpetual02.php?year=<?=($year+1);?>&month=<?=1;?>"><img src="garrow2.png" width=30px height=30px></a>
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
                            echo "<td>".($i*7+$j+1-$startday)."<br>"."<div class=light>".$str."</td>";
                        }

                    }
                    echo "</tr>";
                }
                
                ?>
            </table>
        </div>
    </div>
    <div id=right>
        <?php
            echo "<div class=fontb>".$tdd."</div>";
            echo "<div class=fonta>".$TDD."</div>";
        ?>
    </div>
</div>
</body>
</html>