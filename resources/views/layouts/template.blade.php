<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jspc-gray.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/js-persian-cal.min.js') }}"></script>
    <style>
        .alert {
            position: fixed;
            width: 200px;
            left: 10px;
            bottom: 10px;
            z-index: 10;
        }

        td {
            text-align: center;
        }

        thead > tr > th{
            text-align: center;
        }
    </style>
    <script>
        $(function () {
            $('.alert').delay(3000).slideUp(3000);
        });
    </script>
</head>

{{--<div class="floatright">--}}
    {{--<a href="/">خانه</a>--}}
    {{--<a href="{{ route('doctor') }}">پزشکان</a>--}}
    {{--<a href="{{ route('specialty') }}">تخصص ها</a>--}}
    {{--<a href="{{ route('clinic') }}">درمانگاه</a>--}}
    {{--<a href="{{ route('time') }}">اختصاص نوبت</a>--}}
    {{--<a href="{{ route('clientele') }}">مراجعین</a>--}}
{{--</div>--}}

@yield('content')
@if(Session()->has('msg'))
    <div class="alert alert-success dir_rtl"><b>{{Session('msg')}}</b></div>
@endif
@if(Session()->has('dang_msg'))
    <div class="alert alert-danger dir_rtl"><b>{{Session('dang_msg')}}</b></div>
@endif
@if(count($errors))
    <div class="alert alert-danger dir_rtl">Error:{{$errors->first()}}</div>
@endif