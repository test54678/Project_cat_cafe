


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

// document.querySelectorAll('.ok').forEach(function(elem) {
//     elem.addEventListener('click', function() {
//         let get_date = this.getAttribute('data-date');
//         document.querySelector('input[name="get_date"]').value = get_date;
//         console.log('ボタンが押されました', get_date);
//     });
// });
// $(".ok").click(function(){
// 	let get_date = $(this).data("date");
// 	$('input[name="get_date"]').val(get_date);
// });
	
// $(".pre").click(function(){
// 	let pre = $(this).data("pre");
// 	$(".cal_disp div").hide();
// 	$(".cal_disp .set_cal" + pre).fadeIn();
// });
 
// $(".next").click(function(){
// 	let next = $(this).data("next");
// 	$(".cal_disp div").hide();
// 	$(".cal_disp .set_cal" + next).fadeIn();
// 	console.log(next);
// });
	
