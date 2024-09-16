<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}


//DBConnection
function db_conn(){
 try {
    $db_name = "db_bm";
    $db_id   = "root";
    $db_pw   = "";
    $db_host = "localhost";
    return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
 } catch (PDOException $e) {
  exit('DB Connection Error:'.$e->getMessage());
 }
    
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    }


//リダイレクト関数: redirect($file_name)
function redirect($filename){
header("Location: ".$filename);
exit();
}






?>