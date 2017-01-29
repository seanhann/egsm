@extends('egsm.secondary', ['keyWords'=>'个人资料'])

@section('list')
<div class="login">
		<div class="login-page">
                                        <form class="info-form" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group has-feedback">
                                          <div class="input-group">
                                            <span class="input-group-addon">昵称:</span>
                                            <input type="text" name="cnname" class="form-control no-border" style="box-shadow:none" value="{{ $user->cnname }}" placeholder="{{ $user->cnname == "" ? "设置昵称 4-15位" : $user->cnname }}" pattern=".{4,15}" >
					    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                          </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                          <div class="input-group">
                                            <span class="input-group-addon">性别:</span>
  					    <select name="sex" class="form-control no-border">
  					      <option {{ $user->sex == 0 ? "selected" : "" }} value="0">男</option>
  					      <option {{ $user->sex == 1 ? "selected" : "" }} value="1">女</option>
  					    </select>
					    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                          </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                          <div class="input-group">
                                            <span class="input-group-addon">邮件:</span>
                                            <input type="email" name="email" class="form-control no-border" style="box-shadow:none" value="{{ $user->email }}" placeholder="{{ $user->email == "" ? "设置邮件" : $user->email }}">
					    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                          </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                          <div class="input-group">
                                            <span class="input-group-addon">手机:</span>
                                            <input type="number" disabled class="form-control no-border" style="box-shadow:none" value="{{ $user->username }}" placeholder="{{ $user->username }}" pattern="\d*">
					    <span class="glyphicon glyphicon-ban-circle form-control-feedback"></span>
                                          </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                          <div class="input-group">
                                            <span class="input-group-addon">QQ:</span>
                                            <input type="text" name="qqnum" class="form-control no-border" style="box-shadow:none" value="{{ $user->qqnum }}" placeholder="{{ $user->qqnum == "" ? "qq号码 5-11位" : $user->qqnum }}" pattern="\d{5,11}">
					    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                          </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-login" data-placement="top" data-loading-text="提交中..." data-toggle="tooltip" data-placement="bottom" title="登录">提交</button>

                                        </form>
		</div>
</div> 
