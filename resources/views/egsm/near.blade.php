@extends('egsm.app')

@section('list')

<script>
$(function(){
	//app.makeToast('message', 1);
	function load(location){
		var item = ' <li class="list-group-item btn"> <a href="/egsm/detail/@id@"> <div class="media"> <div class="media-left"> <img alt="90x90" class="media-object" data-src="holder.js/90x90" src="http://www.egousm.com/@pic@" data-holder-rendered="true" style="width: 90px; height: 90px; border-radius: 5px;">	</div> <div class="media-body" style="padding: 5px"> <div class="media-heading" style="font-weight: bold; font-size:17px">@title@</div> <p style="font-size: 12px; color:#666">@content@</p> </div> </div> </a> </li>';

		var map = ['@id@', '@title@', '@pic@', '@content@'];
		$.ajax({url:'http://api.map.baidu.com/geosearch/v3/nearby', data:{ak:'lLkhdj6Cg29GEzmxOHEQ8oWMNi15lKzP', geotable_id:162208, location:location.coords.longitude+','+location.coords.latitude, radius: 5000, sortby:'distance:1'}, method:'get', dataType:'jsonp'}).done(function( data) {
			if(data && data.status == 0){
				var html = '';
				if(data.size > 0){
					$.each(data.contents, function(i, v){
						var res = item.replace(/@id@|@pic@|@title@|@content@/gi, function myFunction(x){
							if(x == '@id@'){
								return v.RecordId;
							}else if(x == '@title@'){
								return v.title;
							}else if(x == '@pic@'){
								return v.RecordPic;
							}else if(x == '@content@'){
								return v.RecordDescribe;
							}
						});
						html += res;
					});
				}else{
					html = '<div style="text-align:center; padding: 50px 0px 0px 0px"> <img src="./images/nothing.ico" alt="..." style="width:100px"> <div class="caption"> <p style=" text-align: center; ">附近啥都没有</p> </div> </div>';
				}
				$(".content ul").append(html);
			}
			$(".loading-page").css('display', 'none');
		});
	}

	function displayError(error){
		if(error.code == 1){
			html = '<div style="text-align:center; padding: 50px 0px 0px 0px"> <img src="./images/nothing.ico" alt="..." style="width:100px"> <div class="caption"> <p style=" text-align: center; ">无法取得定位权限</p> </div> </div>';
		}else if(error.code == 2){
			html = '<div style="text-align:center; padding: 50px 0px 0px 0px"> <img src="./images/nothing.ico" alt="..." style="width:100px"> <div class="caption"> <p style=" text-align: center; ">无法获取位置信息</p> </div> </div>';
		}else{
			html = '<div style="text-align:center; padding: 50px 0px 0px 0px"> <img src="./images/nothing.ico" alt="..." style="width:100px"> <div class="caption"> <p style=" text-align: center; ">定位超时</p> </div> </div>';
		}
		$(".content ul").append(html);
		$(".loading-page").css('display', 'none');
	}

	if (navigator.geolocation) {
	  	var timeoutVal = 5000;
	  	navigator.geolocation.getCurrentPosition(
	  	  	load, 
	  	  	displayError,
	  	  	{ enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 1000*60*5 }
	  	);
	}else{
		$(".loading-page").css('display', 'none');
	}

});
</script>

<div class="loading-page">
	<div class="middle"></div>
	<div> <h1>定位中...</h1> </div>
	<div> <span class="glyphicon glyphicon-refresh spinning"></span> </div>
</div>
<div class="content">
	<ul class="list-group">
	</ul>
</div>

@endsection
