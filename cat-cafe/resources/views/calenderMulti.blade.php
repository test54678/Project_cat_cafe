<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="../css/app.css" rel="stylesheet">
    <link href="../css/app.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/destyle.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://www.ibnet.ne.jp/column/web/200918/demo/screen.css" rel="stylesheet">
    <!-- jQueryを読み込む -->
    {{-- <script src="{{ asset('js/calender.js') }}"></script> --}}
    <title>マルチカレンダー</title>
</head>
<body>
    {{-- {!! $week2 !!}
    
    <input type="text" name="get_date" value=""> --}}
    
    <!--Swiper -->
<div class="swiper-container">
    <!-- スライド要素を囲むラッパー -->
    <div class="swiper-wrapper"> 
      <!-- スライド -->
      <div class="swiper-slide"><div class="slide1"><p>Slide1</div></div>
      <div class="swiper-slide"><div class="slide2"><p>Slide2</div></div>
      <div class="swiper-slide"><div class="slide3"><p>Slide3</div></div>
      <div class="swiper-slide"><div class="slide4"><p>Slide4</div></div>
    </div>
    <!-- オプション：ページネーション -->
    {{-- <div class="swiper-pagination"></div> --}}
    <!-- オプション：ナビゲーションボタン -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- オプションスクロールバー -->
    {{-- <div class="swiper-scrollbar"></div> --}}
  </div>


{{-- </br>
<div class="number-circle">
    <span class="number">30</span> <!-- ここに表示したい数字を入れてください -->
</div> --}}


    {{-- <script>
        $(".ok").click(function(){
            let get_date = $(this).data("date");
            $('input[name="get_date"]').val(get_date);
            console.log('ボタンが押されました', get_date);
        });
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/calender.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
var mySwiper = new Swiper ('.swiper-container', {
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});
    </script>
</body>
</html>
