<?php

session_start();

use App\Route;

use App\DB;

define("__ROOT" , dirname(__DIR__));

require (__ROOT . "/autoload.php");
require (__ROOT . "/web.php");

$url = isset($_GET['url']) ? "/" . $_GET['url'] : "/";

Route::route($url);

$sql = "show table status like 'user'";
$fetch = DB::fetch($sql);
if($fetch->Auto_increment == 1){
    $sql = "INSERT INTO user (id, password, nicname) VALUES (?, PASSWORD(?), ?)";
    DB::query($sql, ["admin", "1234", "관리자"]);
}

$sql = "show table status like 'category'";
$fetch = DB::fetch($sql);
if($fetch->Auto_increment == 1){
    $sql = "INSERT INTO category(ctname) VALUE(?)";
    DB::query($sql, ['음식']);
    $sql = "INSERT INTO category(ctname) VALUE(?)";
    DB::query($sql, ['일상']);
    $sql = "INSERT INTO category(ctname) VALUE(?)";
    DB::query($sql, ['리뷰']);
}