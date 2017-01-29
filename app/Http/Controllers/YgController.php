<?php namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class YgController extends Controller {

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
		$this->middleware('auth.egsm',['only'=>'user']);
		$this->middleware('nocache',['only'=>'captcha']);
		$this->middleware('captcha',['only'=>'login']);
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$model = \Models\egsm\NewCatalog::all();
		$chartMap = ['glass','shopping-cart','wrench','home','scale', 'education', 'signal', 'yen', 'cutlery', 'phone', 'object-align-bottom', 'tint', 'plane'];
		$bgColorMap = ['#fd9d21', '#599eec', '#ff6767', '#4dc6ee', '#ff80c2', '#fed030', '#84d23d'];

		$hotWords = \Models\egsm\HotSearch::take(8)->orderBy('count','desc')->get();
		return view('egsm.main', ['data'=>$model,'chartMap'=>$chartMap, 'colorMap'=>$bgColorMap, 'hotSearch'=>$hotWords]);
	}

	public function near(){
		return view('egsm.near');
	}

	public function staff(){
		return view('egsm.staff');
	}

	public function about(){
		return view('egsm.about');
	}

	public function login(Request $request){
		$validator = \Validator::make($request->all(), [
                        'username' => 'required|integer', 'password' => 'required',
                ]);

		if ($validator->fails())
                {
			return response()->json(['code' => 0, 'msg'=>'非法输入']);
		}	

                $credentials = $request->only('username', 'password');

                if (Auth::attempt($credentials, 1))
                {
			$user = Auth::user();
			return response()->json(['code' => 1, 'msg'=>$user->toJson()]);
                }else{
			return response()->json(['code' => 2, 'msg'=>'用户名或密码错误']);
		}

	}

	public function regist(Request $request){
	        if(Session::get('captcha') != $request->input('captcha')){
        	        return response()->json(['code'=>3, 'msg'=>'验证码错误']);
        	}

		$verifier = \App::make('validation.presence');
		
		$verifier->setConnection('egsm_remote');

		$validator = \Validator::make($request->all(), [
                        'username' => 'required|integer|unique:pmw_member,username', 
			'password' => 'required',
                ]);
		$validator->setPresenceVerifier($verifier);

		if ($validator->fails())
                {
			return response()->json(['code' => 0, 'msg'=>'已存在号码或者非法号码']);
		}	

		if(
		   !preg_match("/^(13d{1}|15[03689])[0-9]{8}$/",$request->input('username')) &&
		   !preg_match("/^((([0-9]{3}))|([0-9]{3}-))?((0[0-9]{2,3})|0[0-9]{2,3}-)?[1-9][0-9]{6,8}$/",$request->input('username'))
		){
			return response()->json(['code' => 3, 'msg'=>'手机号格式不对']);
		}

		$user = new \Models\egsm\User();
		$user->username = $request->input('username');
		$user->password = md5(md5($request->input('password')));
		$user->passwordpay = '';
		$user->question = '';
		$user->answer = '';
		$user->cnname = '';
		$user->avatar = '';
		$user->sex = 0;
		$user->intro = '';
		$user->email = '';
		$user->qqnum = '';
		$user->telephone = '';
		$user->address = '';
		$user->inviter = '';
		$user->agent_user = '';
		$user->rebatedate = 0;
		$user->mobile = $request->input('username');
		$user->enteruser = 0;
		$user->regtime = time();
		$user->regip = $request->ip();
		$user->logintime = time();
		$user->loginip = $request->ip();

                if ($user->save())
                {
			\Auth::login($user, 1);
			return response()->json(['code' => 1, 'msg'=>$user->toJson()]);
                }else{
			return response()->json(['code' => 2, 'msg'=>'网络错误，请重试']);
		}

	}

	public function user(){
		return Auth::user()->toJson();
	}

	public function points(){
		$user = Auth::user();
		return view('egsm.points', ['user'=>$user]);
	}

	public function info(){
		$user = Auth::user();
		return view('egsm.info', ['user'=>$user]);
	}

	public function postFavorite(Request $request){
		$validator = \Validator::make(['aid'=>$request->input('aid')], [
                        'aid' => 'required|integer',
                ]);
		if ($validator->fails())
                {
			return response()->json(['code' => 0, 'msg'=>'非法输入']);
		}

		$models = \Models\egsm\Favorite::where('aid', $request->input('aid'))->get();
		if( count($models) > 0 ){
			foreach($models as $model){
				if( !$model->delete() ){
					return response()->json(['code' => 2, 'msg'=>'网络有问题，请稍后再试']);
				}
			}
			return response()->json(['code' => 3, 'msg'=>'取消收藏']);
		}else{
			$model = new \Models\egsm\Favorite();
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
		$comments = \Models\egsm\Comment::where('uid', Auth::user()->id)->where('isshow', 1)->get();
		return view('egsm.comments', ['comments'=>$comments]);
	}

	public function favorites(){
		$favorites = \Models\egsm\Favorite::where('uid', Auth::user()->id)->where('isshow', 1)->get();
		return view('egsm.favorites', ['favorites'=>$favorites]);
	}

	public function detail($id)
	{
		$model = \Models\egsm\ArticleDetail::where('article_id', $id)->first();
		$favorited = \Models\egsm\Favorite::where('aid',$id)->first() ? true:false;
		return view('egsm.detail', ['detail'=>$model, 'favorited'=>$favorited]);
	}

	public function content(){
		$models = \Models\egsm\NewCatalog::all();
		$result = array();
		foreach($models as $model){
			foreach($model->articles as $item){
				$result[] = array($item->id, $item->title, $item->pic, $item->detail ? $item->detail->specials : '');
			}
		}
		return response()->json($result);
	}

	private function updateHotSearch($keyWords){
                $find = \Models\egsm\HotSearch::where('key_words','like', $keyWords)->first();

                if($find){
                        $find->count = $find->count+1;
                }else{
                        $find = new \Models\egsm\HotSearch();
			$find->key_words = $keyWords;
			$find->count = 1;
                }
		return $find->save();	
	}

	public function search($keyWords){
		$this->updateHotSearch($keyWords);

		$result = array();
		$catalogs = \Models\egsm\NewCatalog::where('name','like', '%'.$keyWords.'%')->get();
		foreach($catalogs as $catalog){
			foreach($catalog->all_articles as $article){
				$result[$article->id] = $article;
			}	
		}	
	
		$articles = \Models\egsm\NewArticle::where('title','like', '%'.$keyWords.'%')->get();
		foreach($articles as $article){
			$result[$article->id] = $article;
		}	
		
		$hotWords = \Models\egsm\HotSearch::take(8)->orderBy('count','desc')->get();
		
		return view('egsm.search', ['articles'=>$result,'hotSearch'=>$hotWords,'keyWords'=>$keyWords, 'brand'=>'search-page']);
	}

	public function token(){
		echo csrf_token();
	}

	public function captcha(){
    		$response = new Response();
		$captcha = new \Lib\Captcha();
    		$response->headers->set('Content-Type', 'image/png');
    		$code = $captcha->show();
		Session::put('captcha', $code);
    		return $response;
	}

}
