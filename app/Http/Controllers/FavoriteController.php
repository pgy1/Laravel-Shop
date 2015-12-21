<?php namespace App\Http\Controllers;

use App\Favorite;
use App\Http\Requests;

use App\Services\FavoriteService;
use App\Services\ServiceImpl\PastServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller {

    private $favoriteService;//注入service

	private $user;//当前用户信息
    private $msg;

    public function __construct(FavoriteService $favoriteService){
        $this->favoriteService = $favoriteService;
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
        if (view()->exists('favorite'))
            return redirect('favorite/list')->with('msg',$this->msg);
        else
            return redirect('home');
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
        $data = $this->favoriteService->getPages($pageNo, $perPage);

		if (view()->exists('favorite'))
        	return view('favorite',['data'=>$data, 'msg'=>'']);
		else
			return redirect('home');
	}

	public function listByPage($pageNo)
	{
		//
        $pageNo = isset($pageNo)? $pageNo:1 ;
        $perPage = 5;
        $data = $this->favoriteService->getPages($pageNo, $perPage);

		if (view()->exists('favorite'))
        	return view('favorite',['data'=>$data, 'msg'=>'']);
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
        $result = 0;
        $pid = $this->favoriteService->getPidByFid($fid);
        //如果生成过订单
        $pastService = new PastServiceImpl();
        $result2 = $pastService->delete($this->user->id, $pid);
        //删除购物车序号
        if($result2)
            $result = DB::table("favorites")->where('fid',$fid)->delete();

		if (view()->exists('favorite'))
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
	public function destroy()
	{
        $result = 0;
        //如果生成过订单
        $pastService = new PastServiceImpl();
        $result2 = $pastService->clear();
        //删除购物车序号
        if($result2)
            $result = DB::table("favorites")->delete();

        if (view()->exists('favorite'))
            if($result)
                return redirect('/favorite/list')->with("msg","删除成功");
            else
                return redirect('/favorite/list')->with("msg","删除失败");
        else
            return redirect('home');

	}

}
