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
	<nav class="navbar navbar-default search navbar-head navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header {{ $brand or '' }}">
		@if(isset($brand))
	      	<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-menu-left"></span></a>
		@else
	      	<a class="navbar-brand" href="/">易购</a>
		@endif
		<div class="form-group form-head has-feedback has-feedback-left">
		    <form action="/search" method="get">
		    <input type="search" name="search" class="form-control" placeholder="输入商家/品类/商圈"  value="{{ $keyWords or ""}}" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" data-toggle="collapse"/>
		    </form>
		    <i class="form-control-feedback glyphicon glyphicon-search"></i>
		</div>
	
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <div class="panel panel-default hot-search">
	      <div class="panel-heading">热门搜索<a class="close" href="#">X</a></div>
	      <div class="panel-body">
	      <ul class="nav">
		@if( isset($hotSearch) )
		@foreach($hotSearch as $hot)
	        <li><a href="/search/{{ $hot->key_words}}">{{ $hot->key_words }}</a></li>
		@endforeach
		@endif
	      </ul>
	      </div>
	      </div>

	      <div class="panel panel-default history-search">
	      <div class="panel-heading">历史搜索</div>
	      <div class="panel-body">
	      <ul class="nav">
	        <li><a href="#">历史搜索</a></li>
	        <li><a href="#">历史搜索</a></li>
	        <li><a href="#">历史搜索</a></li>
	      </ul>
	      </div>
	      </div>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div style="height:35px;width: 100%"></div>

	@yield('list')

	<div class="jumbotron">
		<div class="footer">
		<p><a href="/login" class="btn btn-default" role="button">&nbsp;&nbsp;登录&nbsp;&nbsp;</a> <a href="/regist" class="btn btn-default" role="button">&nbsp;&nbsp;注册&nbsp;&nbsp;</a></p>
		<p><a href="/">首页</a> | <a href="/staff">我的</a> | <a href="/ygsm.apk">易购下载</a> | <a href="/about">关于易购</a></p>
		<div class="footer-copyright">
        	    <span class="footer-copyright-text">©2017 易购网 冀ICP备16003228号-1</span>
        	    <div class="hr"></div>
        	</div>
		</div>
	</div>
  </body>
</html>
