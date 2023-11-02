<?php
echo "publicサイトのファイルです";

        ///////基本的なカレンダー/////start/////////////////////
        $week = array('日', '月', '火', '水', '木', '金', '土');
        $now_month = date("Y年n月"); //表示する年月
        $start_date = date('Y-m-01'); //開始の年月日
        $end_date = date("Y-m-t"); //終了の年月日
        $start_week = date("w", strtotime($start_date)); //開始の曜日の数字
        $x=date("w", strtotime($end_date));
        $end_week = 6 - date("w", strtotime($end_date)); //終了の曜日の数字
        
        $week2 = ""; // 初期化
        $week2 .=  '<table class="cal">';
        //該当月の年月表示
        $week2 .= '<tr>';
        $week2 .= '<td colspan="7" class="center">' . $now_month . '</td>';
        $week2 .= '</tr>';

        //曜日の表示 日～土
        $week2 .= '<tr>';
        foreach ($week as $key => $youbi) {
            if ($key == 0) { //日曜日
                $week2 .= '<th class="sun">' . $youbi . '</th>';
            } else if ($key == 6) { //土曜日
                $week2 .= '<th class="sat">' . $youbi . '</th>';
            } else { //平日
                $week2 .= '<th>' . $youbi . '</th>';
            }
        }
        $week2 .= '</tr>';

        //日付表示部分ここから
        $week2 .= '<tr>';
        //開始曜日まで日付を進める
        for ($i = 0; $i < $start_week; $i++) {
            $week2 .= '<td></td>';
        }


        //1日～月末までの日付繰り返し
        for ($i = 1; $i <= date("t"); $i++) {
            $set_date = date("Y-m", strtotime($start_date)) . '-' . sprintf("%02d", $i);
            $week_date = date("w", strtotime($set_date));
            //土日で色を変える
            if ($week_date == 0) {
                //日曜日
                $week2 .= '<td class="sun">' . $i . '</td>';
            } else if ($week_date == 6) {
                //土曜日
                $week2 .= '<td class="sat">' . $i . '</td>';
            } else {
                //平日
                $week2 .= '<td>' . $i . '</td>';
            }
            if ($week_date == 6) {
                $week2 .= '</tr>';
                $week2 .= '<tr>';
            }
        }

        //末日の余りを空白で埋める
        for ($i = 0; $i < $end_week; $i++) {
            $week2 .= '<td></td>';
        }

        $week2 .= '</tr>';
        $week2 .= '</table>';
        ///////基本的なカレンダー/////end/////////////////////
        // exit;
        // return view('calender', ['week2' => $week2]);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/app.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
   <!-- <?php echo $week2; ?> -->
   <table>
  <thead>
    <tr>
      <th>Header 1</th>
      <th>Header 2</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Data 1</td>
      <td>Data 2</td>
    </tr>
    <!-- 繰り返し -->
    
  </tbody>
</table>

</body>
</html>