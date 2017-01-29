@extends('egsm.secondary', ['keyWords'=>'我的积分'])

@section('list')
<div class="panel panel-default">
	<div class="panel-heading">
	</div>
	<ul class="list-group">
	  <li class="list-group-item">
	    <span class="badge">{{ $user->integral}}</span>
		可用积分:
	  </li>
	  <li class="list-group-item">
	    <span class="badge">{{ $user->credit_integral}}</span>
		消费积分
	  </li>
	  <li class="list-group-item">
	    <span class="badge">{{ $user->back_integral}}</span>
		已赠积分
	  </li>
	  <li class="list-group-item">
	    <span class="badge">{{ $user->surplus_integral}}</span>
		结余消费积分
	  </li>
	</ul>
</div> 
@endsection
