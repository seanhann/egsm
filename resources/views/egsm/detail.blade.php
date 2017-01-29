@extends('egsm.secondary')

@section('right-corner')
                <a class="navbar-brand pull-right favour" href="#" value="{{ $detail->article_id }}">
                        <span class="glyphicon {{ (isset($favorited) && $favorited) ? "glyphicon-heart":"glyphicon-heart-empty" }}"></span>
                </a>
@endsection

@section('list')
<div class="detail">

<div class="panel panel-default">
<div class="panel-heading" data-toggle="tooltip" data-placement="bottom">
	<!-- Swiper -->
	<div class="swiper-container">
	    <div class="swiper-wrapper">
		@foreach($detail->images as $img)
	        <div class="swiper-slide">
			<div style="width: 380px; height: 230px; background-image: url('http://www.egousm.com/{{ $img->url }}'); background-position: center;background-size:380px; background-repeat: no-repeat;"></div>
		</div>
		@endforeach
	    </div>
	    <div class="swiper-pagination"></div>
	</div>
</div>
<div class="panel-body">
	<h3>{{ $detail->name }} </h3>
	 <div class="specials">{{ $detail->specials }}</div>
</div> 
</div> 
<div class="panel panel-default contact">
	<div class="panel-heading"></div>
  	<!-- List group -->
  	<ul class="list-group">
  	  <!--<li class="list-group-item title">商家信息</li>-->
  	  <li class="list-group-item">
		<div class="row">
		<div class="title">商家信息</div>
		<div class="col-xs-9">
			{{ $detail->contacter}} 
			<div class="address">地址：{{ $detail->address }}</div>
			<div class="address">电话：{{ $detail->phone }}</div>
		</div>
		<div class="col-xs-3">
			<a href="tel:{{ $detail->phone }}" class="btn btn-default" role="button">
				<span class="glyphicon glyphicon-earphone"></span>
			</a>
		</div>
		</div>
	  </li>
  	</ul>
</div>
</div>
<div class="bottom-loading"></div>

@endsection
