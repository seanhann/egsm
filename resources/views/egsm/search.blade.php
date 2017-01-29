@extends('egsm.app')

@section('list')
	<div class="content">
	<div class="panel panel-default">
		<ul class="list-group">
		@if(count($articles) > 0)
		@foreach($articles as $article)
		<li class="list-group-item btn">
		<a href="detail/{{ $article->id }}"> 
		<div class="media">
			<div class="media-left">
				<img alt="90x90" class="media-object" data-src="holder.js/90x90" src="http://www.egousm.com/{{ $article->pic }}" data-holder-rendered="true" style="width: 90px; height: 90px; border-radius: 5px;">	
			</div> 

			<div class="media-body" style="padding: 5px">
				<div class="media-heading" style="font-weight: bold; font-size:17px">{{ $article->title }}</div>
				<p style="font-size: 12px; color:#666">{{ $article->content }}</p> 
			</div> 
		</div>
		</a>
		</li>
		@endforeach
		@else
		<li class="list-group-item" style="text-align:center">
			没搜到任何结果
		</li>
		@endif
		</ul>
	</div> 
	</div> 
	<div class="bottom-loading"></div>
@endsection
