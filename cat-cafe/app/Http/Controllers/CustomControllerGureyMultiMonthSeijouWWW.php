<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// namespace App\Http\Controllers;

use SplFileObject;


class CustomControllerGureyMultiMonthSeijouWWW extends Controller
{
    //
    public function index()
    {

// 月数を設定するパラメータ

echo "SeijouWWW";
echo "<br>";
        $week2 ="";
        $week2 .='<div class="cal_disp">';

        //////設定値///////////
        $PastCount = -2; //現在の月から前月を計算する
        $MonthCount = 5; //月数
        $MonthFirst = 2; //最初に表示させたい年月
        $Next = 4; //次に進む制御

        //////////////////////
        /////祝日の読み込み//////
        //////////////////////
        $file = new SplFileObject(public_path("config/config_doc/syukujitsu.csv")); 
        $file->setFlags(SplFileObject::READ_CSV); 	
        $syuku_array = array();
        foreach ($file as $line) {
            if(isset($line[1])){
                $date = date("Y-m-d",strtotime($line[0]));
                $name = $line[1];
                $syuku_array[$date] = $name;
            }
        }
         
        $week = array('日','月','火','水','木','金','土');
        
        $now_date_hizuke = date("Y-m-d");  //03と表示されてしまう
        
        // echo "$now_date_hizuke";
        // echo "<br>";
        // exit;

        // $get_date = date("Y-m");
        // $get_date = date("Y-m", strtotime("last month")); //現在の月から前月を計算する
        $get_date = date("Y-m", strtotime("$PastCount month")); //現在の月から前月を計算する
        //3ヵ月分なので3回繰り返し
        for($x=0; $x<$MonthCount; $x++){//月数を増やす
            //▼年月に-1を付けて月初を生成
            $tt = $get_date.'-1';
            //▼現在の日付を起点にfor文の該当月を生成
            $now_date = date('Y-m-01', strtotime($tt.'+'.$x.' month'));
            //▼カレンダーの見出しの年月用
            $now_month = date("Y年n月",strtotime($now_date."+".$x." month"));
            //▼毎月の月末日付取得
            $end_day = date("t",strtotime($now_date));
            //▼月初めの空セルの生成用
            $start_week = date("w", strtotime($now_date.'-01'));
            
            //▼jQueryで制御するためユニークなクラスをつける
            if($x==$MonthFirst){//ここで最初に表示させたい年月を制御
                $week2 .='<div class="set_cal'.$x.'">';
            }
            else{
                // $week2 .='<div class="set_cal'.$x.' style="display: none;"">';
                $week2 .= '<div class="set_cal' . $x . '" style="display: none;">';
                // $week2 .= '<div class="set_cal' . $x . '">';
            }
            $week2 .='<table class="cal">';
            ////////////////////////////////////////////////
            /////該当月の年月表示//////////////////////////////
            ////////////////////////////////////////////////
            $week2 .='<tr>';

            /////////////////
            //◀︎前月に戻す制御//
            ////////////////
            if($x != 0){
                $set_x = $x -1;
                
                $week2 .='<td class="pre" data-pre="'.$set_x.'">◀︎</td>';
            }else{
                $week2 .='<td></td>';
            }
            $week2 .='<td colspan="5" class="center">'.date("Y年n月",strtotime($now_date)).'</td>';
            
            //////////////////
            //次月にすすむ制御▶︎//
            /////////////////
            if($x != $Next){ 
                $set_n = $x +1;
                
                $week2 .='<td class="next" data-next="'.$set_n.'">▶︎</td>';
            }else{
                $week2 .='<td></td>';
            }
            $week2 .='</tr>';
            ///////////////////////////
            ///////曜日の表示 日～土//////
            ///////////////////////////
            $week2 .='<tr>';
            foreach($week as $key => $youbi){
                if($key == 0){ //日曜日
                    $week2 .='<th class="sun">'.$youbi.'</th>';
                }else if($key == 6){ //土曜日
                    $week2 .='<th class="sat">'.$youbi.'</th>';
                }else{ //平日
                    $week2 .='<th>'.$youbi.'</th>';
                }	
            }
            $week2 .='</tr>';
            ////////////////////////////////
            ///////日付表示部分ここから/////////
            ///////////////////////////////
            $week2 .='<tr>';
            //開始曜日まで日付を進める
            for($i=0; $i<$start_week; $i++){
                // $week2 .="<td> 1 </td>";
                $week2 .='<td></td>';
            }

            $yyy ="🌞";
            $zzz ="🕛";
            $xxx ="🌛";

            //現在の日付、menjou 追加
            $now_date3 = date("Y-m-d");
            $now_date_ymd = strtotime($now_date3); //strtotimeにする           

            for($i=1; $i<=$end_day; $i++){		
                $set_date = date("Y-m",strtotime($now_date)).'-'.sprintf("%02d",$i);
                $week_date = date("w", strtotime($set_date));
                $set_date_ymd = strtotime($set_date);
         
                //iから本日の日の部分を置換する
                // $i = 1;
                // $currentYearAndMonth = date("Y-m");
                // $customDate = $currentYearAndMonth . '-' . str_pad($i, 2, "0", STR_PAD_LEFT);

                // echo $customDate;
                // exit;

                //土日で色を変える
                if($week_date == 0){
                    //日曜日
                    // $week2 .='<td class="sun ng">'.$i.'</td>';
                    $week2 .= '<td class="sun ng">';
                    // $week2 .= custom_function($now_date_hizuke,$customDate,$yyy,$zzz,$xxx);
                    $week2 .= custom_function($now_date_hizuke,$set_date,$yyy,$zzz,$xxx);
                    
                }else if($week_date == 6){
                    //土曜日
                    // $week2 .='<td class="sat ng">'.$i.'</td>';
                    $week2 .= '<td class="sat ng">';
                    // $week2 .= custom_function($now_date_hizuke,$customDate,$yyy,$zzz,$xxx);
                    $week2 .= custom_function($now_date_hizuke,$set_date,$yyy,$zzz,$xxx);

            
                }else if(array_key_exists($set_date,$syuku_array)){
                    //祝日
                    // $week2 .='<td class="sun ng">'.$i.'</td>';
                    $week2 .= '<td class="sun ng">';
                    // $week2 .= custom_function($now_date_hizuke,$i,$yyy,$zzz,$xxx);
                    // $week2 .= custom_function($now_date_hizuke,$customDate,$yyy,$zzz,$xxx);
                    $week2 .= custom_function($now_date_hizuke,$set_date,$yyy,$zzz,$xxx);

            
                }else if($now_date_ymd > $set_date_ymd){
                    //過去日付はグレーアウト
                    // $week2 .='<td class="ng">'.$i.'</td>';
                    $week2 .= '<td class="ng">';
                    // $week2 .= custom_function($now_date_hizuke,$i,$yyy,$zzz,$xxx);
                    // $week2 .= custom_function($now_date_hizuke,$customDate,$yyy,$zzz,$xxx);
                    $week2 .= custom_function($now_date_hizuke,$set_date,$yyy,$zzz,$xxx);
            
                }else{
                    //平日
                    // $week2 .='<td data-date="'.$set_date.'" class="ok">'.$i.'</td>';
                    $week2 .= '<td data-date="'.$set_date.'" class="ok">';
                    // $week2 .= custom_function($now_date_hizuke,$i,$yyy,$zzz,$xxx);
                    // $week2 .= custom_function($now_date_hizuke,$customDate,$yyy,$zzz,$xxx);
                    $week2 .= custom_function($now_date_hizuke,$set_date,$yyy,$zzz,$xxx);
            
                }	
                if($week_date == 6){
                    $week2 .='</tr>';
                    $week2 .='<tr>';
                }
            }
         
            //末日の余りを空白で埋める
            $z = 0;
            for($i=$week_date; $i<6; $i++){
                $z = $z + 1; 
                // $week2 .="<td> $z </td>";
                $week2 .="<td></td>";
            }
            $week2 .='</tr>';
            $week2 .='</table>';
            $week2 .='</div>';
        }//end for	
         
        $week2 .='</div>';

        return view('calenderWWW', ['week2' => $week2]);
    }

}
