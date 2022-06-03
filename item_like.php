<?php
// include('funcs.php');
include('functions.php');
session_start();
check_session_id();


// var_dump($_GET);
// exit();

$user_id = $_GET['user_id'];
$item_id = $_GET['item_id'];


// var_dump($_GET);
// exit();

$pdo = connect_to_db();

/* $sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND item_id=:item_id'; */
// $sql = 'INSERT INTO like_table (id, user_id, item_id, created_at) VALUES (NULL, :user_id, :item_id, NOW())';
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// $stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);

// // var_dump($stmt);
// // exit();

// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

// exit();

$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND item_id=:item_id';
// $sql = 'INSERT INTO like_table (id, user_id, item_id, created_at) VALUES (NULL, :user_id, :item_id, now())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);
try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }
  
  $like_count = $stmt->fetchColumn();
//   まずはデータ確認
//   var_dump($like_count);
//   exit();

// まずはデータ確認
// var_dump($like_count);
// exit();

// var_dump($user_id);
// var_dump($item_id);
// exit();

if ($like_count > 0) {
    // いいねされている状態
    $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND item_id=:item_id';
  } else {
    // いいねされていない状態
    $sql = 'INSERT INTO like_table (id, user_id, item_id, created_at) VALUES (NULL, :user_id, :item_id, now())';
    // INSERT INTO like_table (id, user_id, item_id, created_at) VALUES (NULL, 3 ,3,now());  
  }
  
  // 以下は前項と変更なし
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
  $stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);
  
  try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }
  

  header("Location:index.php");
  exit();




// $sql = 'INSERT INTO like_table (id, user_id, item_id, created_at) VALUES (NULL, :user_id, :item_id, NOW())';
// // SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND item_id=:item_id


// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// $stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);

// try {
//     $status = $stmt->execute();
// }   catch (PDOException $e) {
//     echo json_encode(["sql error" => "{$e->getMessage()}"]);
//     exit();
// }


// //if文の前にこれ書かなきゃだめよ
// $like_count = $stmt->fetchColumn();
// // var_dump($like_count);
// // exit();

// if ($like_count>0){
//     //既にいいねがあるので削除する
//     $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND item_id=:item_id';
// }else{
//     //いいねがない状態なので実行する
//     $sql = 'INSERT INTO like_table (id, user_id, todo_id, created_at) VALUES (NULL, :user_id, :todo_id, now())';
// }

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// $stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);

// try {
//     $status = $stmt->execute();
// }   catch (PDOException $e) {
//     echo json_encode(["sql error" => "{$e->getMessage()}"]);
//     exit();
// }


// header("Location:todo_read.php");
// exit();