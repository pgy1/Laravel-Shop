<?php namespace App\Http\Controllers;

use App\Product;
use App\Services\FavoriteService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	private $productService;//注入商品service
	private $favoriteService;//注入购物车service
	private $user;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ProductService $productService,FavoriteService $favoriteService)
	{
		$this->productService = $productService;
		$this->favoriteService = $favoriteService;
		$this->user = Auth::user();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$products = $this->productService->getPages(1,9);
		if(isset($this->user))
			$favorites = $this->favoriteService->getPagesByUser(1, 4);
		else
			$favorites = $this->favoriteService->getPages(1, 4);
//		dd($products);

		return view('home')->with('data',$products)->with('favorites',$favorites);
	}

}
