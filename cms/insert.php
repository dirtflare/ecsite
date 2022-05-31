<?php
//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//商品名 受信チェック:item (商品名)
if(!isset($_POST["item"]) || $_POST["item"]==""){
  exit("ParamError!item!");
}

//金額 受信チェック:value (金額)
if(!isset($_POST["value"]) || $_POST["value"]==""){
  exit("ParamError!value!");
}

//商品紹介文 受信チェック:description (商品紹介文)
if(!isset($_POST["description"]) || $_POST["description"]==""){
  exit("ParamError!description!");
}

//ファイル受信チェック※$_FILES["******"]["name"]の場合 (画像)
if(!isset($_FILES["fname"]["name"]) || $_FILES["fname"]["name"]==""){
  exit("ParamError!Files!");
}



//----------------------------------------------------
//２. POSTデータ取得 (1.が届いてた際に変数に処理、値を取得)
//----------------------------------------------------
$fname  = $_FILES["fname"]["name"];   //File名
$item  = $_POST["item"];   //商品名
$value  = $_POST["value"];   //価格(数字：intvalを使う)
$description = $_POST["description"];   //商品紹介文


//1-2. FileUpload処理
$upload = "../img/"; //画像アップロードフォルダへのパス (../ は、cmsの一つ上のimg階層の〜..という書き方)
//アップロードした画像を../img/へ移動させる記述↓重要
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['fname']['error'];
}

//----------------------------------------------------
//３. DB接続します(エラー処理追加) ☆この形は毎回テンプレになる☆
//----------------------------------------------------
try {
  $pdo = new PDO('mysql:dbname=gsacf_l07_02;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//----------------------------------------------------
//４．データ登録SQL作成 sql文を作成、$stmtへ、バインド変数に連携 sysdate()は現在時刻を表示してくれる
//----------------------------------------------------
$stmt = $pdo->prepare("INSERT INTO ec_table(id, item, value, fname,
description, indate )VALUES(NULL, :item, :value, :fname, :description, sysdate())");
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':value', $value, PDO::PARAM_INT); //数値
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．item.phpへリダイレクト (書き方は以下統一、:のあとにスペース忘れずに)
  header("Location: item.php");
  exit;
}
?>
