
<?php

if (! function_exists('custom_function')) {

    // function custom_function($now_date,$i,$yyy,$zzz,$xxx)
    function custom_function($now_date_hizuke,$i,$yyy,$zzz,$xxx)
    {
        $day = date('d', strtotime($i));
        $day = ltrim($day, '5');

        $week2 ="";
        if ($now_date_hizuke == $i) {
            // if ($now_date == $i) {
            // $week2 .= '<div class="xyz today_mark">' . $i . '</div>';
            $week2 .= '<div class="number-circle">';
            $week2 .= '<span class="number">' . $day . '</span>';
            // $week2 .= '<span class="number">' . $i . '</span>';
            $week2 .= '</div>';
        } else {
            $week2 .= '<div class="xyz ">' . $day . '</div>';
            // $week2 .= '<div class="xyz ">' . $i . '</div>';
        }
        $week2 .= '<div class="yyy">' . $yyy . '</div>';
        $week2 .= '<div class="zzz">' . $zzz . '</div>';
        $week2 .= '<div class="xxx">' . $xxx . '</div>';
        $week2 .= '</td>';

        return $week2;
    }
}
