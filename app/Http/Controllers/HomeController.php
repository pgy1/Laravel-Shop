<?php namespace App\Http\Controllers;

use App\Product;
use App\Services\ProductService;

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

	private $productService;//注入service

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$products = $this->productService->getPages(1,9);
//		dd($products);

		return view('home',['data'=>$products]);
	}

}
