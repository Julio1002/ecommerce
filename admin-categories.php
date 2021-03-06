<?php

use \Hcode\PageAdmin;
use\Hcode\Model\User;
use \Hcode\Page;
use\Hcode\Model\Category;


$app->get("/admin/categories", function(){

	$user = User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("categories", [

		"categories" => $categories
	]);
});

$app->get("/admin/categories/create", function(){

	$user = User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("categories-create");

});

$app->post("/admin/categories/create", function(){

	$user = User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;
});

$app->get("/admin/categories/:idcategory/delete", function($idcategory){

	$user = User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");
	exit;

});

$app->get("/admin/categories/:idcategory", function($idcategory){

	$user = User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-update",[
	 "category" => $category->getValues()
	]);
});

$app->post("/admin/categories/:idcategory", function($idcategory){

	$user = User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});


$app->get("/categories/:idcategory", function($idcategory) 
	{

			$categories = new Category();
			$categories->get((int)$idcategory);

			$page = new Page();
			$page->setTpl("category", [

				'category' => $categories->getValues(),
				'products' => []

			]);

	});
