<?php namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {

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

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
//		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
//		dd($user);
		return view('product');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function lists(Request $request)
	{
		$data = array();
		$value = $request->input("search");
		$product = Product::where('name','like','%'.$value.'%');
		$lists = $product->paginate(5);
		return view('search',['products'=>$lists->toArray(),'pages'=>$lists,'search'=>$value]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function show(Request $request,$pid)
	{
        $product = Product::find($pid);
//		dd($product);
		return view('single',['product'=>$product]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function showbyclass(Request $request,$classid)
	{
        $product = Product::find(1);
		return view('single',['product'=>$product]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function edit(Request $request)
	{
//		dd($user);
		if (view()->exists('product_edit')){
			return view('product_edit');
		}
		return view('home');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
//		dd($request->input());

		$data = array('errNum'=>0, 'errMsg'=>'', 'errDate'=>'');

		$title = $request->input("title");
		$type = $request->input("special");
		$content = $request->input("content");
		$images = serialize($request->input("images"));
		$price = $request->input("price");
		$deadline = $request->input("deadline");
        $payway = $request->input("payway");

        Product::create($request->input());


		return view('product_edit');
	}

    public function upload(Request $request, Response $response){
		$file = $request->file('images');
		if ($request->hasFile('images')){
			$allowed_extensions = ["png", "jpg", "jpeg", "gif"];
			if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
				return ['error' => 'You may only upload png, jpg or gif.'];
			}

			$destinationPath = 'uploads/images/';
			$extension = $file->getClientOriginalExtension();
			$fileName = str_random(10).'.'.$extension;
			$file->move($destinationPath, $fileName);

//			dd($extension);
			return $response->setContent(
				[
					'success' => true,
					'pic' => asset($destinationPath.$fileName),
				]
			);
		}
    }

}
