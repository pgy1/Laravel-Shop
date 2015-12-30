<?php namespace App\Services\ServiceImpl;

use App\Product;
use App\Services\FavoriteService;
use App\Services\ProductService;
use App\Services\商品信息;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class ProductServiceImpl implements ProductService{

    private $favoriteService;
    private $user;

    public function __construct(FavoriteService $favoriteService){
        $this->favoriteService = $favoriteService;
        $this->user = Auth::user();
    }

    /**
     * 商品数据
     * @param $pid 商品随机号
     * */

    public function getProductById($pid){

        $product = DB::table("products")->where("pid","=",$pid)->get();

        return $product[0];
    }

    /**
     * 所有商品数据
     * */

    public function getProducts(){
        //直接获取所有的商品数据
        $products = DB::table('products')->orderBy("updated_at","desc")->get();

        return $products;
    }

    /**
     * 单个用户的商品数据
     * */

    public function getProductsByUser(){
        $data = array();
        //直接获取所有的商品数据
        $products = DB::table("products")
                    ->where('uid',$this->user->id)
                    ->orderBy("updated_at","desc")->get();

        foreach ($products as $product) {
            $fid = $this->favoriteService->getFidByUPid($this->user->id, $product->pid);
            if (!empty($fid)) {
                $product->fid = $fid;
            }
            array_push($data, $product);
        }

        return $data;
    }

    /**
     * 根据关键词搜索的商品数据
     * */

    //单个关键词
    public function getProductsByKey($keyword,$from, $to){

        $products = DB::table("products")
            ->where("name","like","%".$keyword."%")
            ->orderBy("updated_at","desc")
            ->skip($from)->take($to)->get();

        return $products;

    }
    //用户和关键词
    public function getProductsByUserAndKey($keyword,$from, $to){

        $data = array();

        $products = DB::table("products")
            ->where('uid',$this->user->id)
            ->where("name","like","%".$keyword."%")
            ->orderBy("updated_at","desc")
            ->skip($from)->take($to)->get();

        foreach ($products as $product) {
            $fid = $this->favoriteService->getFidByUPid($this->user->id, $product->pid);
            if (!empty($fid)) {
                $product->fid = $fid;
            }
            array_push($data, $product);
        }

        return $data;

    }

    //多关键词
    public function getProductsByMoreKey($keyArray,$from, $to){

    }

    /**
     * 商品分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */

    public function getPages($page,$perPage = 10){

        //翻页的开始-结束
        $from = $page*$perPage-$perPage;
        $to = $perPage;

        //按更新时间倒序输出
        $totalData = $this->getProducts();
        $data['products'] = $this->getProductsByLimit($from, $to);//相当于limit $from,$to
        $data['page']['total'] = count($totalData);//计算数据总条数

        $availible = ceil((count($totalData)/$perPage));//计算数据可分的总页数
        $last = $page;
        //当前页页码大于1的时候，才能-1
        if($page>1)
            $last = $page-1;//计算上一页的页码
        $data['page']['last'] = $last;
        $next = $page+1;//计算下一页的页码
        if($next <= $availible)
            $data['page']['next'] = $page+1;//如果下一页的页码小于或等于可分的总页数，下一页的页码+1
        //把数据存入翻页类中
        $data['paginator'] = new Paginator($data['products'], count($totalData), $page);
//        dd($data);

        return $data;
    }

    /**
     * 单个用户的商品分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */
    public function getPagesByUser($page,$perPage = 10){

        //翻页的开始-结束
        $from = $page*$perPage-$perPage;
        $to = $perPage;

        //按更新时间倒序输出
        $totalData = $this->getProductsByUser();
        $data['products'] = $this->getProductsByLimitAndUser($from,$to);//相当于limit $from,$to
        $data['page']['total'] = count($totalData);//计算数据总条数

        $availible = ceil((count($totalData)/$perPage));//计算数据可分的总页数
        $last = $page;
        //当前页页码大于1的时候，才能-1
        if($page>1)
            $last = $page-1;//计算上一页的页码
        $data['page']['last'] = $last;
        $next = $page+1;//计算下一页的页码
        if($next <= $availible)
            $data['page']['next'] = $page+1;//如果下一页的页码小于或等于可分的总页数，下一页的页码+1
        //把数据存入翻页类中
        $data['paginator'] = new Paginator($data['products'], count($totalData), $page);
//        dd($data);

        return $data;
    }

    /**
     * 查询limit的数据
     * @param $from 开始
     * @param $to 结束
     * */
    public function getProductsByLimit($from, $to){

        $data = array();

        $products = DB::table("products")
            ->orderBy("updated_at","desc")
            ->skip($from)->take($to)->get();

        foreach($products as $product){
            $fid = $this->favoriteService->getFidByPid($product->pid);
            if(!empty($fid)){
                $product->fid = $fid;
            }
            array_push($data,$product);
        }

        return $data;

    }

    //单个用户的limit数据
    public function getProductsByLimitAndUser($from, $to){

        $data = array();

        $products = DB::table("products")
                    ->where("uid",$this->user->id)
                    ->orderBy("updated_at","desc")
                    ->skip($from)->take($to)->get();

        foreach($products as $product){
            $fid = $this->favoriteService->getFidByUPid($this->user->id,$product->pid);
            if(!empty($fid)){
                $product->fid = $fid;
            }
            array_push($data,$product);
        }

        return $data;

    }


    /**
     * 获取收藏随机号
     * @param $uid 用户id
     * @param $pid 商品随机号
     * */

    public function getFidByUPid($uid, $pid)
    {
        // TODO: Implement getFidByUPid() method.
        $favorite = DB::table("favorites")->where("uid",$uid)->where("pid",$pid)->first();
//        dd($favorite);
        if(isset($favorite) && strlen($favorite->fid)>0)
            return $favorite->fid;
        return "";
    }

    /**
     * 新增商品信息
     * @param $product 商品信息
     * */
    public function saveProduct(Product $product)
    {
        // TODO: Implement saveProduct() method.
    }

    /**
     * 更新商品信息
     * @param $product 商品信息
     * */
    public function updateProduct(Product $product)
    {
        // TODO: Implement updateProduct() method.
    }
}