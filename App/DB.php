<?php

namespace App;

class DB
{
    public static $con;

    public static function getDB(){
        if(self::$con == null){
            self::$con = new \PDO("mysql:host=gondr.asuscomm.com; dbname=yy_10204; charset=utf8mb4", "yy_10204", "1234");
        }
        return self::$con;
    }

    public static function fetchAll($sql, $param = []){
        $con = self::getDB();
        $q = $con->prepare($sql);
        $q->execute($param);
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function fetch($sql, $param = []){
        $con = self::getDB();
        $q = $con->prepare($sql);
        $q->execute($param);
        return $q->fetch(\PDO::FETCH_OBJ);
    }

    public static function query($sql, $param =[]){
        $con = self::getDB();
        $q=$con->prepare($sql);
        $cnt = $q->execute($param);
        return $cnt;
    }

    public static function StartAndGO($msg, $link){
        echo "<script>";
        echo "alert('$msg');";
        echo "location.href='$link'";
        echo "</script>";
    }

    public static function StopAndBack($msg){
        echo "<script>";
        echo "alert('$msg');";
        echo "history.back();";
        echo "</script>";
    }
}