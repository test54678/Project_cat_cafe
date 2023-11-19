<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>マルチカレンダー</title>
</head>
<body>
    {!! $week2 !!}
    
    <input type="text" name="get_date" value="">
    
</br>


<div class="number-circle">
    <span class="number">30</span> <!-- ここに表示したい数字を入れてください -->
</div>

<button id="submit">Submit</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/calender.js') }}"></script>
</body>
</html>
