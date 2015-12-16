<?php namespace App\Services;


interface FavoriteService {
    public function getFavorites();
    public function getPages($page,$perPage = 10);
}
