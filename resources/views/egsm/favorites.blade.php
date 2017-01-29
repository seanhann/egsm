@extends('egsm.secondary', ['keyWords'=>'我的收藏'])

@section('list')
@if(count($favorites) > 0)
<div class="content">
<div class="panel panel-default">
	<ul class="list-group">
		@foreach($favorites as $favorite)
		<li class="list-group-item btn">
		<a href="detail/{{ $favorite->aid }}">
		<div class="media">
			<div class="media-left">
				<img alt="90x90" class="media-object" data-src="holder.js/90x90" src="http://www.egousm.com/{{ $favorite->article->pic }}" data-holder-rendered="true" style="width: 90px; height: 90px; border-radius: 5px;">	
			</div> 

			<div class="media-body" style="padding: 5px">
				<div class="media-heading" style="font-weight: bold; font-size:17px">{{ $favorite->article->title }}</div>
				<p style="font-size: 12px; color:#666">{{ $favorite->article->content }}</p> 
			</div> 
		</div>
		</a>
		</li>
		@endforeach
	</ul>
</div>
</div>
@else
    <div style="text-align:center; padding: 50px 0px 0px 0px">
      <img src="./images/nothing.ico" alt="..." style="width:100px">
      <div class="caption">
        <p style=" text-align: center; ">这里啥都没有</p>
      </div>
    </div>
@endif
@endsection
