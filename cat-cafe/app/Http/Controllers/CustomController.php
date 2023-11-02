<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// namespace App\Http\Controllers;

use SplFileObject;


class CustomController extends Controller
{
    //
    public function index()
    {

        
        //
        // $extensionDir = ini_get('extension_dir');
        // echo $extensionDir;
        // exit;
        // echo '今月の末日は' . date("t") . '日です';
        // echo '<br>';
        // echo '今日の曜日は「' . date("w") . '」です';
        // echo '<br>';
        // $week = array('日', '月', '火', '水', '木', '金', '土');
        // echo '今日の曜日は「' . $week[date("w")] . '曜日」です';
        // echo '<br>';
        // for ($i = 1; $i <= date("t"); $i++) {
        //     echo $i . ',';
        // }
        // echo '<br>';
        // echo '<br>';
        //祝日の読み込み
        // $file = new SplFileObject("img/syukujitsu.csv");
        $file = new SplFileObject(public_path("config/config_doc/syukujitsu.csv"));

        $file->setFlags(SplFileObject::READ_CSV);
        $syuku_array = array();
        foreach ($file as $line) {
            if (isset($line[1])) {
                $date = date("Y-m-d", strtotime($line[0]));
                $name = $line[1];
                $syuku_array[$date] = $name;
            }
        }


        ///////基本的なカレンダー/////start/////////////////////
        $week = array('日', '月', '火', '水', '木', '金', '土');
        $now_month = date("Y年n月"); //表示する年月
        $start_date = date('Y-m-01'); //開始の年月日
        $end_date = date("Y-m-t"); //終了の年月日
        $start_week = date("w", strtotime($start_date)); //開始の曜日の数字
        $x = date("w", strtotime($end_date));
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
            }else if(array_key_exists($set_date,$syuku_array)){
                //祝日
                $week2 .= '<td class="sun">'.$i.'</td>';
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
        return view('calender', ['week2' => $week2]);
    }
}
