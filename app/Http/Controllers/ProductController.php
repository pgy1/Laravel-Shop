<?php namespace App\Http\Controllers;

use App\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {

	private $user;
	private $productService;

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
	public function __construct(ProductService $productService)
	{
//		$this->middleware('guest');
		$this->productService = $productService;
		$this->user = Auth::user();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
//		dd($user);
		return view('product.list');
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
		$products = $this->productService->getPages(1,9);

		return view('search',['products'=>$lists->toArray(),'pages'=>$lists,'search'=>$value]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function show($pid)
	{
        $product = $this->productService->getProductById($pid);
		if(isset($this->user))
			$favorite = $this->productService->getFidByUPid($this->user->id,$pid);
		else
			$favorite = null;
		$product->favorite = $favorite;
//		dd($product);
		return view('product.single',['product'=>$product]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function showbyclass(Request $request,$classid)
	{
        $product = Product::find(1);
		return view('product.single',['product'=>$product]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function edit(Request $request)
	{
//		dd($user);
		if (view()->exists('product.edit')){
			return view('product.edit');
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

		$title = empty($request->input("title"))?0:$request->input("title");
		$type = empty($request->input("special"))?0:$request->input("special");
		$content = empty($request->input("content"))?0:$request->input("content");
		$image = empty($request->input("image"))?0:$request->input("image");
		$images = empty($request->input("imagepath"))?0:$request->input("imagepath");
		$price = empty($request->input("price"))?0:$request->input("price");
		$deadline = empty($request->input("deadline"))?0:$request->input("deadline");
        $payway = $request->input("payway");
		$product = array();
		$product["pid"] = time().rand(10000,99999);
		$product["uid"] = $this->user->id;
		$product["name"] = $title;
		$product["type"] = $type;
		$product["description"] = $content;
		$product["image"] = $image;
		$product["images"] = $images;
		$product["price"] = $price;
		$product["deadline"] = $deadline;
		$product["payway"] = $payway;
//		dd($product);

//		if($title!=0 && $type!=0 && $content!=0 && $images!=0 && $price!=0 && $deadline!=0)
        	Product::updateOrCreate($product);


		if (view()->exists('product.edit')){
			return view('product.edit');
		}
		$products = $this->productService->getPages(1,9);
		return view('home')->with('data',$products);
	}

    public function upload(Request $request, Response $response){
		$file = $request->file('images');
		if ($request->hasFile('images')){
			$allowed_extensions = ["png", "jpg", "jpeg", "gif"];
			if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
				return ['error' => 'You may only upload png, jpg or gif.'];
			}

			$destinationPath = 'images/product/'.date("Ymd",time()).'/';
			$extension = $file->getClientOriginalExtension();
			$fileName = str_random(10).'.'.$extension;
			$file->move($destinationPath, $fileName);

//			dd($extension);
			$path = "/".$destinationPath.$fileName;
			$pic = asset($destinationPath.$fileName);
		}
		return $response->setContent(
			[
				'success' => true,
				'pic' => $pic,
				'path' => $path,
			]
		);
    }

}
