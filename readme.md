# Laravel PHP Framework

#商城项目

为了实现更多实用功能进行的试验

![图片](https://github.com/pgy1/Laravel-Shop/blob/shop/home.jpg)

#目前功能开发：

```php

商品发布：Product

购物车管理：Favorite

订单管理：Past

```

#注意事项

```php
下载项目完成后，cmd进入文件夹目录
composer update

```

#需求分析

##商品展示


```php

分页展示商品，所以基础函数是分页函数
附加：购物车功能、查看详细信息

```

###首页展示

```php
HomeController
滚动翻页、右侧简易购物车提示

```
![图片](https://github.com/pgy1/Laravel-Shop/blob/shop/home.jpg)

###搜索展示

```php
ProductController
单个关键词、多个关键词搜索-瀑布流形式

```

###用户商品管理展示

```php
ProductController
关键词搜索、删除，修改，增加--列表形式

```

##购物车功能

```php
FavoriteController
登录后，才能使用；所以加入购物车的时候，需要用户信息。


```
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
