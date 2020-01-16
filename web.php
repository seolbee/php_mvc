<?php

use App\Route;

Route::get("/", "MainController@index");

Route::get("/write", "MainController@write");

Route::get("/login", "MainController@login");

Route::get("/register", "MainController@register");

Route::get("/logout", "BoardController@logout");

Route::get("/view", "MainController@view");

Route::post("/write_ok", "BoardController@write_ok");

Route::post("/register_ok", "BoardController@register_ok");

Route::post("/login_ok", "BoardController@login_ok");

Route::get("/search", "MainController@search");

Route::get("/ajax", "MainController@ajax");

if(isset($_SESSION['user']) && $_SESSION['user']->id == "admin"){
    Route::get("/admin", "MainController@admin");
    Route::get("/delete", "BoardController@delete");
    Route::get("/update", "MainController@update");
    Route::get("/categoryDelete", "BoardController@categoryDelete");
    Route::post("/category", "BoardController@category");
    Route::post("/password_update", "BoardController@password_update");
}