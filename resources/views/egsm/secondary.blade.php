<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>易购商盟</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/swiper.min.css" rel="stylesheet">
    <link href="/css/egsm.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/js/jquery-1.12.4.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/swiper.min.js"></script>
    <script src="/js/egsm.js"></script>

  </head>
  <body>
	<nav class="navbar navbar-default secondary navbar-head navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header {{ $brand or '' }}">
		<div class="title">
		    {{ $keyWords or "详细信息"}}
		</div>
	      	<a class="navbar-brand" href="javascript: window.history.back();"><span class="glyphicon glyphicon-menu-left"></span></a>
		@yield('right-corner');
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>

	<div style="height:35px;width: 100%"></div>

	@yield('list')

  </body>
</html>
