<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>萬年曆作業</title>
  <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <style>
    body {
      background: url(./background.jpg);
      background-size: cover;
      box-sizing: border-box;
      margin: 0;
    }

    .cell {
      width: 80px;
      height: 50px;
      margin: 0;
      padding-top: 5px;
      box-sizing: border-box;
      text-align: center;
      font-family: Marker Felt, fantasy;
    }

    .dayoff {
      color: red;
      font-family: Marker Felt, fantasy;
    }

    .title-box {
      width: 760px;
      margin: 50px auto 0 auto;
    }

    .header {
      margin: 0 auto;
      padding: 0;
      text-align: center;
      font-weight: bold;
      font-size: 40px;
      width: 760px;
      background: lightblue;
      border-radius: 20px 20px 0 0;
    }

    .head-month-box {
      width: 760px;
      margin: 0 auto;
    }

    .head-month {
      text-align: center;
      font-weight: bold;
      font-size: 32px;
      padding: 0;
      background: lightblue;
    }

    .calendar-box {
      display: flex;
      flex-direction: row;
      width: 760px;
      margin: 0 auto;
    }

    .img-box {
      width: 200px;
      height: 356px;
      margin-right: 0;
      text-align: right;
    }

    .calendar {
      width: 560px;
      height: 356px;
      margin: auto;
      box-sizing: border-box;
      display: flex;
      flex-wrap: wrap;
      align-content: start;
      justify-content: start;
      background: white;
    }

    .footer-box {
      margin: 0 auto;
      padding: 0;
      text-align: center;
      width: 760px;
      background-color: lightblue;
      border-radius: 0 0 20px 20px;
    }

    main {
      width: 760px;
      margin: 10px auto;
      -webkit-box-shadow: 9px 15px 15px -3px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 9px 15px 15px -3px rgba(0, 0, 0, 0.75);
      box-shadow: 9px 15px 15px -3px rgba(0, 0, 0, 0.75);
      border-radius: 0 0 20px 20px;
    }

    input[type=text] {
      margin: 5px;
      padding: 1px;
      height: 20px;
    }

    input[type=submit] {
      margin: 5px;
      padding: 0 5px;
      border-radius: 5px;
      background: #7343E9;
      color: white;
      font-family: "標楷體";
    }

    input[type=submit]:hover {
      background-color: green;
    }

    select {
      font-size: 15px;
      font-family: "標楷體";
    }

    footer {
      text-align: center;
      margin: 20px auto 0 auto;
      border: 1px solid black;
      height: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 200px 200px 200px 200px;
      -moz-border-radius: 200px 200px 200px 200px;
      -webkit-border-radius: 200px 200px 200px 200px;
      width: 100px;
      background: #E94373;
      border: none;
    }

    footer a {
      color: black;
      font-size: 20px;
      font-family: "標楷體";
      font-weight: bold;
    }
  </style>
</head>

<body>
  <h1 style="text-align:center;">萬年曆</h1>
  <?php
  // 判斷有無get值
  if (isset($_GET['month'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
  } else {
    $month = date("m");
    $year = date("Y");
  }

  // 防止年份輸入小於等於0或沒輸入
  if (isset($_GET['year']) && empty($_GET['year'])) {
    $year = date("Y");
  } else if (isset($_GET['year']) && $_GET['year'] <= 0) {
    $year = date("Y");
  }
  // 一般情況的年月
  $lastmonth = $month - 1;
  $lastyear = $year;

  $nextmonth = $month + 1;
  $nextyear = $year;
  // 跨年月的情況
  if ($month == 1) {
    $lastmonth = 12;
    $lastyear = $year - 1;

    $nextmonth = $month + 1;
    $nextyear = $year;
  } else if ($month == 12) {

    $lastmonth = $month - 1;
    $lastyear = $year;

    $nextmonth = 1;
    $nextyear = $year + 1;
  }
  // 用在直接換上一年或下一年的按鈕
  $lastyear2 = $year - 1;
  $nextyear2 = $year + 1;
  // 用在直接返回現在年月的按鈕
  $nowyear = date("Y");
  $nowmonth = date("m");
  // 國定假日
  $specialDate = [
    date("$year-1-1") => "元旦", date("$year-2-28") => "和平紀念日", date("$year-12-25") => "聖誕節",
    date("$year-4-3") => "兒童節", date("$year-4-4") => "清明節", date("$year-5-1") => "勞動節", date("$year-6-14") => "端午節",
    date("$year-9-20") => "中秋節", date("$year-10-10") => "國慶日"
  ];

  // 某年某月的1號
  $firstDay = date("$year-$month-01");
  // 1號從星期幾開始 也可以判斷第一周前面有幾個空白天
  $firstWeekWhiteDays = date("w", strtotime($firstDay));
  // 這個月有幾天
  $monthDays = date("t", strtotime($firstDay));
  // 第一周有幾天
  $firstWeekDays = 7 - $firstWeekWhiteDays;
  // 用(第一周的空白天+當月天數)除以7 無條件進位後來判斷有幾周
  $weeks = ceil(($firstWeekWhiteDays + $monthDays) / 7);
  // 最後一周的天數
  $lastWeekDays = ($firstWeekWhiteDays + $monthDays) % 7;
  // 最後一周的空白天
  $lastWeekWhiteDays = 7 - $lastWeekDays;
  // 當月全部天數的空白格子 (當月空白天+當月天數  也等於週數*7)
  $allCells = $weeks * 7;
  //陣列中加入首列資料
  $headers = ['Sun.', 'Mon.', 'Tues.', 'Wed.', 'Thur.', 'Fri.', 'Sat.'];

  // 把當月的元素依序加到一個陣列
  // 陣列中加入第一周的空白天;
  for ($i = 0; $i < $firstWeekWhiteDays; $i++) {
    $td[] = "";
  }
  // 陣列中加入當月天數 ex:加入1~30天 1~31天
  for ($i = 0; $i < $monthDays; $i++) {
    $td[] = ($i + 1);
  }
  // 陣列中加入最後一周的空白天
  for ($i = 0; $i < $lastWeekWhiteDays; $i++) {
    $td[] = "";
  }
  ?>
  <main>
    <!-- 上面的年月box -->
    <div class="title-box">
      <header class="header">
        <div>
          <a href="index.php?year=<?= $lastyear2; ?>&month=<?= $month; ?>"><i class="fas fa-angle-left fa-xs"></i></a>
          &nbsp
          <span>
            <?= $year; ?>
          </span>
          &nbsp
          <a href="index.php?year=<?= $nextyear2; ?>&month=<?= $month; ?>"><i class="fas fa-angle-right fa-xs"></i></a>
        </div>
      </header>
      <?php
      echo "<div class=head-month-box>";
      echo "<div class=head-month>";
      echo "<a href='index.php?year=$lastyear&month=$lastmonth'>" . '<i class="fas fa-angle-left fa-sm"></i>' . "</a> &nbsp &nbsp";
      if ($month == 1) {
        echo "Jan.";
      } else if ($month == 2) {
        echo "Feb.";
      } else if ($month == 3) {
        echo "Mar.";
      } else if ($month == 4) {
        echo "Apr.";
      } else if ($month == 5) {
        echo "May.";
      } else if ($month == 6) {
        echo "Jun.";
      } else if ($month == 7) {
        echo "Jul.";
      } else if ($month == 8) {
        echo "Aug.";
      } else if ($month == 9) {
        echo "Sep.";
      } else if ($month == 10) {
        echo "Oct.";
      } else if ($month == 11) {
        echo "Nov.";
      } else {
        echo "Dec.";
      }
      echo "&nbsp &nbsp <a href='index.php?year=$nextyear&month=$nextmonth'>" . '<i class="fas fa-angle-right fa-sm"></i>' . "</a>";
      echo "</div>";
      echo "</div>";
      ?>
    </div>
    <!-- 中間的月曆+圖片 box -->
    <section class="calendar-box">
      <div class="img-box">
        <?php
        if ($month == 1) {
        ?>
          <img src="https://i.picsum.photos/id/1000/5626/3635.jpg?hmac=qWh065Fr_M8Oa3sNsdDL8ngWXv2Jb-EE49ZIn6c0P-g" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 2) {
        ?>
          <img src="https://i.picsum.photos/id/10/2500/1667.jpg?hmac=J04WWC_ebchx3WwzbM-Z4_KC_LeLBWr5LZMaAkWkF68" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 3) {
        ?>
          <img src="https://i.picsum.photos/id/1002/4312/2868.jpg?hmac=5LlLE-NY9oMnmIQp7ms6IfdvSUQOzP_O3DPMWmyNxwo" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 4) {
        ?>
          <img src="https://i.picsum.photos/id/1015/6000/4000.jpg?hmac=aHjb0fRa1t14DTIEBcoC12c5rAXOSwnVlaA5ujxPQ0I" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 5) {
        ?>
          <img src="https://i.picsum.photos/id/1018/3914/2935.jpg?hmac=3N43cQcvTE8NItexePvXvYBrAoGbRssNMpuvuWlwMKg" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 6) {
        ?>
          <img src="https://i.picsum.photos/id/1032/2880/1800.jpg?hmac=5SLBdyPZBMyr5IBkIRfffZV10bP87Y7RrxVZX1vCefA" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 7) {
        ?>
          <img src="https://i.picsum.photos/id/106/2592/1728.jpg?hmac=E1-3Hac5ffuCVwYwexdHImxbMFRsv83exZ2EhlYxkgY" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 8) {
        ?>
          <img src="https://i.picsum.photos/id/112/4200/2800.jpg?hmac=8Qhr0ehkFOnlKO__aKhLMQTu2qzcAten9LHpBO6uk-k" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 9) {
        ?>
          <img src="https://i.picsum.photos/id/147/2448/2448.jpg?hmac=Xk6y7EeyG6VQTac1N9IhDAwLVNVeCn_KBN4nO5SRxPw" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 10) {
        ?>
          <img src="https://i.picsum.photos/id/167/2896/1944.jpg?hmac=YZo5hYh18tGFz3wI4Eic6fdwNHA2pN1ZpNjVNElC8wk" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 11) {
        ?>
          <img src="https://i.picsum.photos/id/168/1920/1280.jpg?hmac=mVK82R-5FsJLUcjRsdWA1-NdN6xw6MexzmRmtqNpWUs" width="200px" height="356px" alt="">
        <?php
        }
        ?>
        <?php
        if ($month == 12) {
        ?>
          <img src="https://i.picsum.photos/id/195/768/1024.jpg?hmac=rksrWrgeGQzOdzXlnzsTWy2L2zYq4gQei3TBMWCmXsI" width="200px" height="356px" alt="">
        <?php
        }
        ?>
      </div>
      <div class="calendar">
        <?php
        //月曆頭的地方
        foreach ($headers as $header) {
          if ($header == "Sun." || $header == "Sat.") {
            echo "<div class='dayoff cell'>";
            echo $header;
            echo "</div>";
          } else {

            echo "<div class='cell'>";
            echo $header;
            echo "</div>";
          }
        }
        //月曆body的地方
        for ($i = 0; $i < $allCells; $i++) {
          $w = $i % 7;
          if (isset($td[$i])) {
            $date = date("$year-$month-") . $td[$i];
          }
          if ($w == 0 || $w == 6) {
            echo "<div class='dayoff cell'>";
          } else if (isset($date) && array_key_exists($date, $specialDate)) {
            echo "<div class='dayoff cell'>";
          } else {
            echo "<div class='cell'>";
          }
          echo $td[$i];
          // array_key_exists(要找的key,被檢查的陣列)
          if (isset($date) && array_key_exists($date, $specialDate)) {
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
    <!-- 下面的input box -->
    <section class="footer-box">
      <div style="font-family:'標楷體';">
        <form action="" method="get">
          <input type="text" name="year" id="year" placeholder="請輸入正整數 ex:2010">年
          <select name="month" id="month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select> 月
          <input type="submit" value="送出">
        </form>
      </div>
    </section>
  </main>
  <!-- 返回當前年月的連結 -->
  <footer>
    <!-- <a href="index.php?year=<?= $nowyear; ?>&month=<?= $nowmonth; ?>">當前年月</a> -->
    <a href="index.php">當前年月</a>
  </footer>
</body>
<html>