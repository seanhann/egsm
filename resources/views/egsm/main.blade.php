@extends('egsm.app')

@section('list')

<div class="loading-page">
	<div class="middle"></div>
	<div> <h1>易购商盟</h1> </div>
	<div> <span class="glyphicon glyphicon-refresh spinning"></span> </div>
</div>
<!-- Swiper -->
<div class="swiper-container catalog-swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
		<div class="btn-group btn-group-lg catalog" role="group">
		@foreach($data as $i=> $calalog)
		@if($i< 10)
			<a href="search/{{ $calalog->name }}" class="btn" role="button">
				<div>
				<span class="glyphicon glyphicon-{{ $chartMap[$i%count($chartMap)] }}" style="background: {{ $colorMap[$i%count($colorMap)] }}"></span>
				</div>
				<span style=" font-size: 10px; ">{{ $calalog->name }}</span>
			</a>
		@endif
		@endforeach
		</div>
	</div>
        <div class="swiper-slide">
		<div class="btn-group btn-group-lg catalog" role="group">
		@foreach($data as $i=> $calalog)
		@if($i >= 10)
			<a href="search/{{ $calalog->name }}" class="btn" role="button">
				<div>
				<span class="glyphicon glyphicon-{{ $chartMap[$i%count($chartMap)] }}" style="background: {{ $colorMap[$i%count($colorMap)] }}"></span>
				</div>
				<span style=" font-size: 10px; ">{{ $calalog->name }}</span>
			</a>
		@endif
		@endforeach
		</div>
	</div>
    </div>
    <div class="swiper-pagination"></div>
</div>


<div class="panel panel-default special-offer">
<div class="panel-heading"></div>
<ul class="list-group">
	@for($i=101; $i<=105; $i++)
	<li><a href="#">
	      <img width="100%" src="http://www.egousm.com/images/{{$i}}.jpg">
	</a></li> 
	@endfor
</ul>
<div class="panel-heading"></div>
</div>

<div class="content">
	<div class="panel panel-default">
		<div class="panel-heading">猜你喜欢</div>
		<ul class="list-group">
		</ul>
		<div class="bottom-loading">点击加载更多</div>
	</div> 
</div>

<script>
$(function(){
	var page = 1;
	function load(page){
		var item = ' <li class="list-group-item btn"> <a href="detail/@id@"> <div class="media"> <div class="media-left"> <img alt="90x90" class="media-object" data-src="holder.js/90x90" src="http://www.egousm.com/@pic@" data-holder-rendered="true" style="width: 90px; height: 90px; border-radius: 5px;">	</div> <div class="media-body" style="padding: 5px"> <div class="media-heading" style="font-weight: bold; font-size:17px">@title@</div> <p style="font-size: 12px; color:#666">@content@</p> </div> </div> </a> </li>';

		var map = ['@id@', '@title@', '@pic@', '@content@'];
		$.get('/content?page='+page, function(data){
			if(data.length > 0){
				var html = '';
				$.each(data, function(i, v){
					var res = item.replace(/@id@|@pic@|@title@|@content@/gi, function myFunction(x){
						return v[map.indexOf(x)];
					});
					html += res;
				});
				$(".content ul").append(html);
			}else{
				$(".bottom-loading").empty();	
			}
			$(".loading-page").css('display', 'none');
		});
	}
	load(page);

	$(".bottom-loading").click(function(){
		page+=1;
		load(page);
	});
	/*
	$(window).scroll(function() {
	    if($(window).scrollTop() >= $(document).height() - $(window).height()) {
		page+=1;
		load(page);
	    }
	});
	*/
});
</script>

@endsection
