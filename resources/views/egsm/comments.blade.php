@extends('egsm.secondary', ['keyWords'=>'我的评论'])

@section('list')

@if(count($comments) > 0)
@foreach($comments as $comment)
<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
	{{ $comment->body }}
  </div>
</div>
@endforeach
@else
    <div style="text-align:center; padding: 50px 0px 0px 0px">
      <img src="./images/nothing.ico" alt="..." style="width:100px">
      <div class="caption">
        <p style=" text-align: center; ">这里啥都没有</p>
      </div>
    </div>
@endif

@endsection
