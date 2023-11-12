
//日付を押して反応する制御
$(".ok").click(function(){
    let get_date = $(this).data("date");
    $('input[name="get_date"]').val(get_date);
    console.log('ボタンが押されました', get_date);
});

$(".pre").click(function(){
	let pre = $(this).data("pre");
	$(".cal_disp > div").hide();
	// $(".cal_disp .set_cal" + pre).fadeIn();
	$(".cal_disp .set_cal" + pre).fadeIn();
});

$(".next").click(function(){
	let next = $(this).data("next");
	$(".cal_disp > div").hide();
	// $(".cal_disp .set_cal" + next).fadeIn();
	$(".cal_disp .set_cal" + next).fadeIn();
	console.log(next);
});	
	
window.onload = function() {
	// ここにHTMLが完全に読み込まれた後に実行するコードを記述します。
	console.log("HTML is fully loaded and parsed.");

	// let next = $(this).data("next");
	// $(".cal_disp > div").hide();
	// // $(".cal_disp .set_cal" + next).fadeIn();
	// $(".cal_disp .set_cal" + next).fadeIn();
  };
  