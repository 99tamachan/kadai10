<?php

//1. POSTデータ取得
$name   = $_POST["name"];
$url  = $_POST["url"];
$come = $_POST["come"];
$id     = $_POST["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET name=:name, url=:url, come=:come, indate=:indate WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':come', $come, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':indate', $come, PDO::PARAM_STR); 
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT); 
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("bm_list_view.php");
}
?>
