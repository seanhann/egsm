<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>易购商盟</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/swiper.min.css" rel="stylesheet">
    <link href="/css/egsm.css" rel="stylesheet">

    <script src="/js/jquery-1.12.4.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/swiper.min.js"></script>
    <script src="/js/egsm.js"></script>

  </head>
  <body>
        <div class="modal login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span>登录或注册</span>
				<a type="button" class="btn btn-secondary" data-dismiss="modal">X</a>
			</div>
			<div class="login-page">
			<div class="btn-group btn-group-justified" role="group" aria-label="">
				<div class="btn" role="button" id="login" >登录</div>
				<div class="btn" role="button" id="regist" >注册</div>
			</div>
    			<!-- Swiper -->
    			<div class="swiper-container login-swiper">
    			    <!-- Add Pagination -->
    			    <div class="swiper-scrollbar swiper-top"></div>
    			    <div class="swiper-wrapper">
    			        <div class="swiper-slide">
					<form class="login-form">
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">账号</span>
					    <input type="number" name="username" class="form-control no-border" style="box-shadow:none" placeholder="请输入手机号" pattern="\d*">
					  </div>
					</div>
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">密码</span>
					    <input type="password" name="password" class="form-control no-border" style="box-shadow:none" placeholder="请输入密码">
					  </div>
					</div>
					<div class="form-group has-feedback login-captcha">
					  <div class="input-group">
					    <span class="input-group-addon">
						<img src="/captcha" class="captcha-img"/>
					    <a class="btn refresh">
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-repeat"></span>
						换一张
						</span>
					    </a>
					    </span>
					  </div>
					</div>
					<div class="form-group has-feedback login-captcha">
					  <div class="input-group">
					    <span class="input-group-addon">验证</span>
					    <input type="text" name="captcha" class="form-control no-border" aria-describedby="captcha" style="box-shadow:none" placeholder="请输入验证码">
					  </div>
					</div>

					<button type="submit" disabled  class="btn btn-info btn-login" data-loading-text="登录中..." data-toggle="tooltip" data-placement="bottom" title="登录">登录</button>

					</form>
				</div>
    			        <div class="swiper-slide">
					<form class="register-form">
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">账号</span>
					    <input type="number" name="username" class="form-control no-border" style="box-shadow:none" placeholder="请输入手机号" pattern="\d*">
					  </div>
					</div>
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">密码</span>
					    <input type="password" pattern=".{8,20}" name="password" class="form-control no-border" style="box-shadow:none" placeholder="请输入密码">
					  </div>
					</div>
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">确认</span>
					    <input type="password" pattern=".{8,20}" name="confirm" class="form-control no-border" style="box-shadow:none" placeholder="请确认密码">
					  </div>
					</div>
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">
						<img src="/captcha" class="captcha-img"/>
					    <a class="btn refresh">
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-repeat"></span>
						换一张
						</span>
					    </a>
					    </span>
					  </div>
					</div>
					<div class="form-group has-feedback">
					  <div class="input-group">
					    <span class="input-group-addon">验证</span>
					    <input type="text" name="captcha" class="form-control no-border" aria-describedby="captcha" style="box-shadow:none" placeholder="请输入验证码">
					  </div>
					</div>
					<button type="submit" disabled class="btn btn-info btn-login" data-loading-text="注册中..." data-toggle="tooltip" data-placement="top" title="注册">注册</button>
					</form>

				</div>
    			    </div>
    			</div><!--end of swiper -->
    			</div><!-- end fo login-page -->

		</div> <!-- end of panel -->
            </div><!-- end of modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal login -->
	<div class="self">
		<div class="panel panel-default self-header">
		  <div class="panel-body require-auth">
			<a class="btn {{ isset($login) ? '':'btn-login' }}" href="#">
			<span class="circle-avatar">易</span>
			<div class="username">点击请登录</div>
			</a>	
		  </div>
		</div>

		<div class="panel panel-default self-list">
		  <div class="panel-heading"></div>
		  <div class="list-group require-auth">
		    <a href="/points" class="list-group-item list-group-item-action">
		      <span class="glyphicon glyphicon-piggy-bank blue-icon"></span>
		      <span class="text">我的积分</span>
		      <span class="badge"><span class="glyphicon glyphicon-menu-right"></span></span>
		    </a>
		    <a href="/info" class="list-group-item list-group-item-action">
		      <span class="glyphicon glyphicon-list blue-icon"></span>
		      <span class="text">个人资料</span>
		      <span class="badge"><span class="glyphicon glyphicon-menu-right"></span></span>
		    </a>
		    <a href="/comments" class="list-group-item list-group-item-action">
		      <span class="glyphicon glyphicon-comment red-icon"></span>
		      <span class="text">我的评价</span>
		      <span class="badge"><span class="glyphicon glyphicon-menu-right"></span></span>
		    </a>
		    <a href="/favorites" class="list-group-item list-group-item-action">
		      <span class="glyphicon glyphicon-heart red-icon"></span>
		      <span class="text">我的收藏</span>
		      <span class="badge"><span class="glyphicon glyphicon-menu-right"></span></span>
		    </a>
		  </div>
		  <div class="panel-heading"></div>
		  <div class="list-group">
		    <a href="tel: +4000310604" class="list-group-item list-group-item-action">
		      <span class="glyphicon glyphicon-earphone green-icon"></span>
		      <span class="text">客服中心</span>
		      <span class="badge"><span class="glyphicon glyphicon-menu-right"></span></span>
		    </a>
		    <a href="/about" class="list-group-item list-group-item-action">
		      <span class="glyphicon glyphicon-info-sign green-icon"></span>
		      <span class="text">关于易购</span>
		      <span class="badge"><span class="glyphicon glyphicon-menu-right"></span></span>
		    </a>
		  </div>
		</div><!-- end of panel self-list -->
	</div><!-- end of self -->

	<nav class="navbar navbar-default navbar-fixed-bottom">  
	    		<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navbar-header"> 
				<div class="btn-group btn-group btn-group-justified" role="group" aria-label="Justified button group"> 
					<a href="/" class="btn" role="button"><span class="glyphicon glyphicon-home"></span><br><span style=" font-size: 10px; ">首页</span></a>
					<a href="/near" class="btn" role="button"><span class="glyphicon glyphicon-map-marker"></span><br><span style=" font-size: 10px; ">附近</span></a>
					<a href="#" class="btn" role="button" aria-controls="myself" data-target="#myself" aria-expanded="false" data-toggle="collapse"><span class="glyphicon glyphicon-user"></span><br><span style=" font-size: 10px; ">我的</span></a>
				</div>
			</div>  
	</nav>


  </body>
</html>
