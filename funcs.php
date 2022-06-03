<?php
//XSS対応関数
function h($val){
  return htmlspecialchars($val,ENT_QUOTES);
}

// DBと接続
function connect_to_db()
{
  $dbn='mysql:dbname=gsacf_l07_02;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return $pdo = new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
  }
}


?>
