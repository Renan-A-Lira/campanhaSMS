<?php

use Pecee\SimpleRouter\SimpleRouter;
require('controller/homeController.php');
require('controller/tableController.php');
require('controller/middlewares/postResquestMiddlewares.php');

SimpleRouter::get('/', [HomeController::class, 'getHome']);

//middleware para verificar inputs preenchidos
SimpleRouter::group(['middleware' => PostRequestMiddleware::class], function () {
    SimpleRouter::post('/', [TableController::class, 'postTable']);

});

?>