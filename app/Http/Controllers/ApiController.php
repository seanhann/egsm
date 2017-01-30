<?php namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth.egsm');
	}


	public function user(){
		return Auth::user()->toJson();
	}

	public function postFavorite(Request $request){
		$validator = \Validator::make(['aid'=>$request->input('aid')], [
                        'aid' => 'required|integer',
                ]);
		if ($validator->fails())
                {
			return response()->json(['code' => 0, 'msg'=>'非法输入']);
		}

		$models = \Models\Favorite::where('aid', $request->input('aid'))->get();
		if( count($models) > 0 ){
			foreach($models as $model){
				if( !$model->delete() ){
					return response()->json(['code' => 2, 'msg'=>'网络有问题，请稍后再试']);
				}
			}
			return response()->json(['code' => 3, 'msg'=>'取消收藏']);
		}else{
			$model = new \Models\Favorite();
			$model->aid = $request->input('aid'); 
			$model->molds = 1;
			$model->uid = Auth::user()->id;
			$model->uname = Auth::user()->username;
			$model->link = "/egsm/detail/".$request->input('aid');
			$model->ip = $request->ip();
			$model->isshow = 1;
			if ($model->save() ){
				return response()->json(['code' => 1, 'msg'=>'收藏成功']);
			}else{
				return response()->json(['code' => 2, 'msg'=>'网络有问题，请稍后再试']);
			}
		}
	}

	public function postInfo(Request $request){
		$validator = \Validator::make($request->all(), [
                        'cnname' => 'min:4|max:15', 
			'sex' => 'boolean',
			'email' => 'email',
			'qqnum' => 'min:5|max:11',
                ]);

		if ($validator->fails() || ($request->input('qqnum') != "" && !is_numeric($request->input('qqnum'))) )
                {
			return response()->json(['code' => 0, 'msg'=>'非法输入']);
		}	
	
		$user = Auth::user();	
		if($request->input('cnname') != ""){
			$user->cnname = $request->input('cnname');	
		}
		if($request->input('sex') != ""){
			$user->sex = $request->input('sex') ? 1:0;	
		}
		if($request->input('email') != ""){
			$user->email = $request->input('email');	
		}
		if($request->input('qqnum') != ""){
			$user->qqnum = $request->input('qqnum');	
		}

		if($user->save()){
			return response()->json(['code' => 1, 'msg'=>'提交成功']);
		}else{
			return response()->json(['code' => 2, 'msg'=>'网络问题，请等会儿再试']);
		}
		
	}

	public function comments(){
		$comments = \Models\Comment::where('uid', Auth::user()->id)->where('isshow', 1)->get();
		
		return response()->json($comments);
	}

	public function favorites(){
		$favorites = \Models\Favorite::where('uid', Auth::user()->id)->where('isshow', 1)->get();
		foreach($favorites as $favorite){
			$favorite->article;
		}
		return response()->json($favorites);
	}
}
