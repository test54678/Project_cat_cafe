
//日付を押して反応する制御
// $(".ok").click(function(){
//     let get_date = $(this).data("date");
//     $('input[name="get_date"]').val(get_date);
//     console.log('ボタンが押されました', get_date);
// 	// var elements = document.getElementsByClassName('ok');
// 	// console.log('ボタンが押されました',elements );
// });

$(".pre").click(function(){
	let pre = $(this).data("pre");
	$(".cal_disp > div").hide();
	$(".cal_disp .set_cal" + pre).fadeIn();
	// $(".cal_disp .set_cal" + pre).show();
});

$(".next").click(function(){
	let next = $(this).data("next");
	$(".cal_disp > div").hide();
	// $(".cal_disp .set_cal" + next).fadeIn();
	$(".cal_disp .set_cal" + next).fadeIn();
	// $(".cal_disp .set_cal" + next).show();
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

//   document.addEventListener('DOMContentLoaded', (event) => {
//     var cells = document.querySelectorAll(".ok");

//     for (var i = 0; i < cells.length; i++) {
//         cells[i].addEventListener("click", function () {
//             this.style.backgroundColor = 'red'; // ここで色を設定します
//         });
//     }
// });

// JavaScript
// document.addEventListener('DOMContentLoaded', (event) => {
//     var cells = document.querySelectorAll(".ok");

//     for (var i = 0; i < cells.length; i++) {
//         cells[i].addEventListener("click", function () {
//             // Check current background color
//             var currentColor = this.style.backgroundColor;
            
//             // If it's red, change to light blue, else change to red
//             if (currentColor === 'red') {
//                 this.style.backgroundColor = 'lightblue';
//             } else {
//                 this.style.backgroundColor = 'red';
//             }
//         });
//     }
// });

// JavaScript
document.addEventListener('DOMContentLoaded', (event) => {
    var cells = document.querySelectorAll(".ok");

    for (var i = 0; i < cells.length; i++) {
        // Store the original color
        cells[i].dataset.originalColor = cells[i].style.backgroundColor;
        
        cells[i].addEventListener("click", function () {
            // Check current background color
            var currentColor = this.style.backgroundColor;

            // If current color is light blue, change back to original color, else change to light blue
            if (currentColor === 'lightblue') {
                this.style.backgroundColor = this.dataset.originalColor;
            } else {
                this.style.backgroundColor = 'lightblue';
            }
        });
    }
});

// JavaScript
// document.addEventListener('DOMContentLoaded', (event) => {
//     var cells = document.querySelectorAll(".ok");

//     for (var i = 0; i < cells.length; i++) {
//         // Store the original color
//         cells[i].dataset.originalColor = cells[i].style.backgroundColor;
        
//         cells[i].addEventListener("click", function () {
//             // Check current background color
//             var currentColor = this.style.backgroundColor;

//             // If current color is light blue, change back to original color and add hover class, else change to light blue and remove hover class
//             if (currentColor === 'lightblue') {
//                 this.style.backgroundColor = this.dataset.originalColor;
//                 this.classList.add('hover-bg-color');
//             } else {
//                 this.style.backgroundColor = 'lightblue';
//                 this.classList.remove('hover-bg-color');
//             }
//         });
//     }
// });


document.addEventListener('DOMContentLoaded', (event) => {
    var submitButton = document.getElementById('submit'); // update this with your submit button id
    
    submitButton.addEventListener("click", function () {
        var cells = document.querySelectorAll(".ok");
        var dates = [];

        for (var i = 0; i < cells.length; i++) {
            // Check current background color
            if (cells[i].style.backgroundColor === 'lightblue') {
                // Logic to get the date from cell
                // Update accordingly based on how date is stored in your cell
                // dates.push(cells[i].innerText);
				dates.push(cells[i].dataset.date);
            }
        }

        // Show alert with all the dates
        alert('Selected Dates: ' + dates.join(', '));
    });
});
