<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <style>
        .dayoff{
            /* background-color:pink; */
            color:red;
            font-family:Marker Felt, fantasy;
        }
        /* .special-date{
            background-color:black;
            color:white;
        } */
    </style>
</head>
<body>
<style>
    body{
        background:lightgray;
        /* background-size: cover; */
        box-sizing:border-box;
        margin:0;
    }
.cell{
    width:80px;
    height:50px;
    /* border:1px solid #999; */
    /* display:inline-block; */
    margin:0;
    padding-top:5px;
    box-sizing:border-box;
    text-align:center;
    font-family:Marker Felt, fantasy;
}
/* .calendar-bg{
    background:lightblue;
} */
.calendar-box{
    display:flex;
    flex-direction:row;
    width:760px;
    /* border:2px solid red; */
    margin:0 auto;
    -webkit-box-shadow: 9px 9px 15px -3px rgba(0,0,0,0.75);
    -moz-box-shadow: 9px 9px 15px -3px rgba(0,0,0,0.75);
    box-shadow: 9px 9px 15px -3px rgba(0,0,0,0.75); 
}
.img-box{
    width:200px;
    height:356px;
    /* border:1px solid black; */
    margin-right:0;
    text-align:right;
}
.calendar{
    width:560px;
    height:356px;
    margin:auto;
    /* border:3px solid black; */
    box-sizing:border-box;
    display:flex;
    flex-wrap:wrap;
    align-content:start;
    justify-content:start;
    background:white;
}
.header{
    margin:0 auto;
    padding:0;
    text-align:center;
    font-weight:bold;
    /* font-style:italic; */
    /* border:1px solid; */
    font-size:40px;
    /* height:80px; */
    width:760px;
    background:lightblue;
}
.head-month-box{
    width:760px;
    margin:0 auto;
    /* border:1px solid; */
}
.head-month{
    text-align:center;
    /* margin:10px auto; */
    /* border:1px solid; */
    font-weight:bold;
    font-size:32px;
    padding:0;
    background:lightblue;
}
.button{
    text-align:center;
    margin:10px auto;
    border:1px solid black;
}
.title-box{
    /* border:1px solid black; */
    width:760px;
    margin:50px auto 0 auto;
    -webkit-box-shadow: 9px 15px 15px -3px rgba(0,0,0,0.75);
    -moz-box-shadow: 9px 15px 15px -3px rgba(0,0,0,0.75);
    box-shadow: 9px 15px 15px -3px rgba(0,0,0,0.75); 
}


</style>
<?php
    
   //echo $specialDate['2011-11-11'];
/*     $firstDay=date("Y-m-01");
    $month=date("m"); */


    //直接訪問本頁不帶值
    //訪問本頁帶月份值
    /* empty(1)=>false
    !empty(1)=>!false=>true
    empty(0)=>true
    !empty(0)=!true=>false */

    if(isset($_GET['month'])){
        $month=$_GET['month'];
        $year=$_GET['year'];
    }else{
        $month=date("m");
        $year=date("Y");
    }
    
    $lastmonth=$month-1;
    $lastyear=$year;

    $nextmonth=$month+1;
    $nextyear=$year;
    
    if($month==1){
        $lastmonth=12;
        $lastyear=$year-1;

        $nextmonth=$month+1;
        $nextyear=$year;

    }else if($month==12){

        $lastmonth=$month-1;
        $lastyear=$year;

        $nextmonth=1;
        $nextyear=$year+1;
    }

    $specialDate=[date("$year-1-1")=>"元旦",date("$year-2-28")=>"和平紀念日",date("$year-12-25")=>"聖誕節",
    date("$year-4-3")=>"兒童節",date("$year-4-4")=>"清明節",date("$year-5-1")=>"勞動節",date("$year-6-14")=>"端午節",
    date("$year-9-20")=>"中秋節",date("$year-10-10")=>"國慶日"];

    // 某年某月的1號
    $firstDay=date("$year-$month-01");
    // 1號從星期幾開始 也可以判斷第一周前面有幾個空白天
    $firstWeekWhiteDays=date("w",strtotime($firstDay));
    // 這個月有幾天
    $monthDays=date("t",strtotime($firstDay));
    // 第一周有幾天
    $firstWeekDays=7-$firstWeekWhiteDays;
    // 用(第一周的空白天+當月天數)除以7 無條件進位後來判斷有幾周
    $weeks=ceil(($firstWeekWhiteDays+$monthDays)/7);
    // 最後一周的天數
    $lastWeekDays=($firstWeekWhiteDays+$monthDays)%7;
    // 最後一周的空白天
    $lastWeekWhiteDays=7-$lastWeekDays;
    // 當月全部天數的空白格子 (當月空白天+當月天數  也等於週數*7)
    $allCells=$weeks*7;
    //陣列中加入首列資料
    $headers=['Sun.','Mon.','Tues.','Wed.','Thur.','Fri.','Sat.'];

    // 把當月的元素依序加到一個陣列
    // 陣列中加入第一周的空白天;
    for($i=0;$i<$firstWeekWhiteDays;$i++){
        $td[]="";
    }
    // 陣列中加入當月天數 ex:加入1~30天 1~31天
    for($i=0;$i<$monthDays;$i++){ 
        $td[]=($i+1);
    }
    // 陣列中加入最後一周的空白天
   for($i=0;$i<$lastWeekWhiteDays;$i++){
        $td[]="";
    }

    ?>
<div class="title-box">
<header class="header">
    <div>
        <span><?=$year;?></span>
    </div>
</header>
<?php
echo "<div class=head-month-box>";
echo "<div class=head-month>";
echo "<a href='index2.php?year=$lastyear&month=$lastmonth'>". '<i class="fas fa-angle-left fa-sm"></i>' . "&nbsp &nbsp" ."</a>";
if($month==1){
    // echo "<div class=head-month>";
    echo "Jan.";
    // echo "</div>";
}else if($month==2){
    // echo "<div class=head-month>";
    echo "Feb.";
    // echo "</div>";
}else if($month==3){
    // echo "<div class=head-month>";
    echo "Mar.";
    // echo "</div>";
}else if($month==4){
    // echo "<div class=head-month>";
    echo "Apr.";
    // echo "</div>";
}else if($month==5){
    // echo "<div class=head-month>";
    echo "May.";
    // echo "</div>";
}else if($month==6){
    // echo "<div class=head-month>";
    echo "Jun.";
    // echo "</div>";
}else if($month==7){
    // echo "<div class=head-month>";
    echo "Jul.";
    // echo "</div>";
}else if($month==8){
    // echo "<div class=head-month>";
    echo "Aug.";
    // echo "</div>";
}else if($month==9){
    // echo "<div class=head-month>";
    echo "Sep.";
    // echo "</div>";
}else if($month==10){
    // echo "<div class=head-month>";
    echo "Oct.";
    // echo "</div>";
}else if($month==11){
    // echo "<div class=head-month>";
    echo "Nov.";
    // echo "</div>";
}else{
    // echo "<div class=head-month>";
    echo "Dec.";
    // echo "</div>";
}
echo "<a href='index2.php?year=$nextyear&month=$nextmonth'>". "&nbsp &nbsp" . '<i class="fas fa-angle-right fa-sm"></i>' ."</a>";
echo "</div>";
echo "</div>";
?> 
</div>
<!-- <section class="img-box">
    
</section> -->

<section class="calendar-box">
    <div class="img-box">
    <img src="https://i.picsum.photos/id/1000/5626/3635.jpg?hmac=qWh065Fr_M8Oa3sNsdDL8ngWXv2Jb-EE49ZIn6c0P-g" width="200px" height="356px" alt="">
    </div>
<div class="calendar"> 

<?php
// $w=0;

//月曆頭的地方
foreach($headers as $header){
    if($header=="Sun." || $header=="Sat."){
        echo "<div class='dayoff cell'>";
        echo $header;
        echo "</div>";
    }else{

        echo "<div class='cell'>";
        echo $header;
        echo "</div>";
    }
}

//月曆body的地方
for($i=0;$i<$allCells;$i++){
    $w=$i%7;
    if(isset($td[$i])){
        $date=date("$year-$month-").$td[$i];
        // 把is_numeric改成isset後,把下面這行加回去,上面的$w=0;也加回來
        // $w=date("w",strtotime($date));
    }

    if($w==0 || $w==6){
        echo "<div class='dayoff cell'>";
    }else if(isset($date) && array_key_exists($date,$specialDate)){
        echo "<div class='dayoff cell'>";
    }else{
        echo "<div class='cell'>";
    }
    echo $td[$i];
    // array_key_exists(要找的key,被檢查的陣列)
    if(isset($date) && array_key_exists($date,$specialDate)){
        echo "<br>";
        echo "<span style='color:red;font-size:12px;'>";
        echo $specialDate[$date];
        echo "</span>";
    }
    echo "</div>";
}
?>
</div>
</section>


<!-- 按鈕 -->
<!-- <div class="button">
     <div>
         <a href="index2.php?year=<?=$lastyear;?>&month=<?=$lastmonth;?>">上一個月</a>
         <a href="index2.php?year=<?=$nextyear;?>&month=<?=$nextmonth;?>">下一個月</a>
    </div>   
</div> -->


</body>
</html>