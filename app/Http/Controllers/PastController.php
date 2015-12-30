<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Past;
use App\Product;
use App\Services\PastService;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PastController extends Controller {

    private $pastService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PastService $pastService)
    {
        $this->pastService = $pastService;
        $this->middleware('auth');
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
		//获取当前用户的信息
        $uid = Auth::user()->id;
//        dd(Auth::user()->toArray());
		$product = Product::getProductById($pid);
		$product = $product[0];

        $pastid = $pid . time();//订单随机号

		//如果订单没有生成
		if(!Past::exsitId($uid, $pid)) {
			$past = new Past;
			$past->pastid = $pastid;
			$past->uid = $uid;
			$past->pid = $pid;
			$past->pname = $product->name;
			$past->price = $product->price;
			$past->type = $product->type;
			$past->payway = $product->payway;
			$past->image = $product->image;
			$past->save();
		}else{
            $past = Past::getPastByUPid($uid, $pid);
            $past = $past[0];
            $pastid = $past->pastid;
        }

//		dd($product);
		$this->show($pastid);
		return redirect('past/show'."/".$pastid);
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
	 * @return Response
	 */
	public function lists()
	{
        $pageNo = 1 ;
        $perPage = 5;
		$pasts = $this->pastService->getPages($pageNo,$perPage);
//        dd($pasts);
        if (view()->exists('past.list'))
		    return view('past.list')->with('data',$pasts);
        else
            return redirect('home');
	}

    public function listByPage($pageNo)
    {
        $pageNo = isset($pageNo)? $pageNo:1 ;
        $perPage = 5;
        $pasts = $this->pastService->getPages($pageNo,$perPage);
//        dd($pasts);
        if (view()->exists('past.list'))
            return view('past.list')->with('data',$pasts);
        else
            return redirect('home');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($pastid)
	{
		//
        $past = Past::getPastByPastId($pastid);
        $past = $past[0];
        return view('past.show')->with('past',$past);
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
	 * 删除订单
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($pastid)
	{
        $result = DB::table("pasts")->where('pastid',$pastid)->delete();

        if (view()->exists('past.show'))
            if($result)
                return redirect('/past/list')->with("msg","删除成功");
            else
                return redirect('/past/list')->with("msg","删除失败");
        else
            return redirect('home');
	}
    //删除全部
	public function destroy()
	{
        $result = $this->pastService->clear();

        if (view()->exists('past.show'))
            if($result)
                return redirect('/past/list')->with("msg","删除成功");
            else
                return redirect('/past/list')->with("msg","删除失败");
        else
            return redirect('home');
	}

}
