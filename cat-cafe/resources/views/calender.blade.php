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
    <!-- jQueryを読み込む -->
    {{-- <script src="{{ asset('js/calender.js') }}"></script> --}}
    <title>Document</title>
</head>
<body>
    {!! $week2 !!}
    
    <input type="text" name="get_date" value="">
    
    {{-- <script>
        $(".ok").click(function(){
            let get_date = $(this).data("date");
            $('input[name="get_date"]').val(get_date);
            console.log('ボタンが押されました', get_date);
        });
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/calender.js') }}"></script>
</body>
</html>
