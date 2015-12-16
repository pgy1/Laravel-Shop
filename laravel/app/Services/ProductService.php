<?php namespace App\Services;


interface ProductService {
    public function getProducts();
    public function getPages($page,$perPage = 10);
}
