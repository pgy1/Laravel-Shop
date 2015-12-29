<?php namespace App\Http\Controllers;

use App\Favorite;
use App\Http\Requests;

use App\Services\FavoriteService;
use App\Services\ProductService;
use App\Services\ServiceImpl\PastServiceImpl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class FavoriteController extends Controller {

    private $favoriteService;//注入service
    private $productService;//注入service
	private $redis;//当前用户信息

	private $user;//当前用户信息
    private $msg;

    public function __construct(FavoriteService $favoriteService, ProductService $productService){
		$this->middleware('auth');
        $this->favoriteService = $favoriteService;
        $this->productService = $productService;
        $this->user = Auth::user();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($pid)
	{
		$this->msg = "添加失败";
		//如果购物车不存在该物品，则添加到购物车
        if(!$this->favoriteService->exsitObjByUPid($this->user->id, $pid)){
            $now = time();
            $fid = $pid.$now.rand(10000,99999);
            $favorite = new Favorite;
            $favorite->pid = $pid;
            $favorite->uid = $this->user->id;
            $favorite->fid = $fid;
            $favorite->ftime = $now;
			$favorite->save();

			$this->msg = "添加成功";
        }
        if (view()->exists('favorite.list'))
//            return redirect('/favorite/list')->with('msg',$this->msg);
            return redirect()->back()->with('msg',$this->msg);
        else
            return redirect('home');
	}

	/**
	 * 未登录时，将购物车信息存入redis缓存中
	 * @param $pid 商品信息
	 * */
	public function cache($pid){

		$redis = Redis::connection();
		$now = time();
		$fid = $pid.$now.rand(10000,99999);

		$redis->hSet('favorite','pid_'.$fid, $pid);
		$redis->hSet('favorite','ftime_'.$fid, $now);

		if (view()->exists('favorite.cachelist'))
			return redirect('favorite/cachelist')->with('msg',$this->msg);
		else
			return redirect('home');
	}

	/**
	 * 未登录时，获取内存中的购物车信息
	 * */
	public function cacheList(){

		$redis = Redis::connection();

//		$redis->flushAll();

//		$redis_sort_option=array('BY'=>'ftime_*',
//			'SORT'=>'DESC',
//            'GET'=>array('#','pid_*','ftime_*')
//		);
//		dd($redis->sort('favorite_*',$redis_sort_option));
		$list = $redis->hGetAll('favorite');
		dd($list);


//
//		$data['favorites'] = array();
//
//
//
//		if (view()->exists('favorite.cachelist'))
//			return view('favorite.cachelist')->with('msg',$this->msg);
//		else
//			return redirect('home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function lists()
	{
		//
        $pageNo = 1;
        $perPage = 5;
        $data = $this->favoriteService->getPagesByUser($pageNo, $perPage);

		if (view()->exists('favorite.list'))
        	return view('favorite.list',['data'=>$data, 'msg'=>'']);
		else
			return redirect('home');
	}

	public function listByPage($pageNo)
	{
		//
        $pageNo = isset($pageNo)? $pageNo:1 ;
        $perPage = 5;
        $data = $this->favoriteService->getPages($pageNo, $perPage);

		if (view()->exists('favorite.list'))
        	return view('favorite.list',['data'=>$data, 'msg'=>'']);
		else
			return redirect('home');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($fid)
	{
		//删除购物车序号
		$result = DB::table("favorites")->where('fid',$fid)->delete();

		if (view()->exists('favorite.list'))
			if($result)
				return redirect('/favorite/list')->with("msg","删除成功");
			else
				return redirect('/favorite/list')->with("msg","删除失败");
		else
			return redirect('home');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function cancel($pid)
	{
        $result = 0;
		$uid = $this->user->id;
		$fid = $this->productService->getFidByUPid($uid, $pid);
//		dd($fid);
		if(isset($fid) && !empty($fid)) {
			//删除购物车序号
			$result = DB::table("favorites")->where('fid',$fid)->delete();
		}


		if (view()->exists('favorite.list'))
			if($result)
				return redirect()->back()->with("msg","删除成功");
			else
				return redirect()->back()->with("msg","删除失败");
		else
			return redirect('home');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
        $result = 0;
        //如果生成过订单
        $pastService = new PastServiceImpl();
        $result2 = $pastService->clear();
        //删除购物车序号
        if($result2)
            $result = DB::table("favorites")->delete();

        if (view()->exists('favorite.list'))
            if($result)
                return redirect('/favorite/list')->with("msg","删除成功");
            else
                return redirect('/favorite/list')->with("msg","删除失败");
        else
            return redirect('home');

	}

}
