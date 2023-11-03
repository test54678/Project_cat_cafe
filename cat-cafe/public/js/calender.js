


$(".ok").click(function(){
    let get_date = $(this).data("date");
    $('input[name="get_date"]').val(get_date);
    console.log('ボタンが押されました', get_date);
});

// document.querySelectorAll('.ok').forEach(function(elem) {
//     elem.addEventListener('click', function() {
//         let get_date = this.getAttribute('data-date');
//         document.querySelector('input[name="get_date"]').value = get_date;
//         console.log('ボタンが押されました', get_date);
//     });
// });
