@extends('egsm.secondary', ['keyWords'=>'易购网'])
@section('list')
<div class="login-page">
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
@endsection
