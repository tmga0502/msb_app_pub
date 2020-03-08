<!DOCTYPE html>
<html lang="ja">
<head>
    <title>結家　物件管理ツール</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ url('/') }}/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="{{ url('/') }}/KAdmin-Dark/images/icons/favicon.png ">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/') }}/KAdmin-Dark/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/') }}/KAdmin-Dark/images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/bootstrap-print.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/all.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/main.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/KAdmin-Dark/styles/jquery.news-ticker.css">

    <!-- 管理者用用css -->
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/css/pm.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <script type="text/javascript" src="js/pm_main.js"></script> -->
</head>

<body>
  @if(Auth::check())
    @include('pm.topbar')
  @else
    @include('topbar_guest')
  @endif

  @yield('content')

    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery-1.10.2.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery-ui.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/bootstrap-hover-dropdown.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/html5shiv.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/respond.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.metisMenu.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.slimscroll.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.cookie.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/icheck.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/custom.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.news-ticker.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.menu.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/pace.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/holder.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/responsive-tabs.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.categories.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.pie.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.tooltip.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.resize.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.fillbetween.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.stack.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/jquery.flot.spline.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/zabuto_calendar.min.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="{{ url('/') }}/KAdmin-Dark/script/highcharts.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/data.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/drilldown.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/exporting.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/highcharts-more.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/charts-highchart-pie.js"></script>
    <script src="{{ url('/') }}/KAdmin-Dark/script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="{{ url('/') }}/KAdmin-Dark/script/main.js"></script>
    <script src="{{ url('/') }}/js/pm_main.js"></script>
</body>
</html>
