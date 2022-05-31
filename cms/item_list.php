<?php
//1.  DB接続します (毎回コピペ)
try {
  $pdo = new PDO('mysql:dbname=gsacf_l07_02;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table");
$status = $stmt->execute();


//３．データ表示 (毎回コピペ)
$view="";
if($status==false) {
//execute（SQL実行時にエラーがある場合）
$error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);

} else {
//Selectデータの数だけ自動でループしてくれる (.= で$viewに$resultを付け加える処理) (毎回コピペ)
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
  $view .= '<li class="cart-list">';
  $view .= '<p class="cart-thumb"><img src="../img/'.$result["fname"].'"width="200"></p>';
  $view .= '<h2 class="cart-title">'.$result["item"].'</h2>';
  $view .= '<p class="cart-price">'.$result["value"].'</p>';
  $view .= '<a href="#" class="btn-delete">削除</a>';
  $view .= '</li>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  <!--header-->
  <header class="header">
    <p class="site-title"><a href="#"><img src="../images/common/logo4.png" alt="Entourage Coffee Shop"></a></p>
  </header>
  <!--end header  -->

  <div class="outer">
    <h1 class="page-title page-title__cms">Product Management</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul class="cart-products">
          <?php echo $view; ?>
        </ul>
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

      <div class="footer-widget__long">
        <p><a href="#"><img src="../images/common/logo4.png" alt="Entourage Coffee Shop"></a></p>
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
        <li class="nav-footer__item"><a href="#">CBD GUIDE</a></li>
        <li class="nav-footer__item"><a href="#">STAFF BLOG</a></li>
        <li class="nav-footer__item"><a href="#">OEMについて</a></li>
        <li class="nav-footer__item"><a href="#">原料販売について</a></li>
        <li class="nav-footer__item"><a href="#">LINK</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="#">Entourage Coffee Shop??</a></li>
          <li class="nav-footer__item"><a href="#">Contact Us</a></li>
          <li class="nav-footer__item"><a href="#">Cart</a></li>
          <li class="nav-footer__item"><a href="#">Member Page</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="../images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/twitter.png" alt=""></a></li>
        </ul>
      </div>

    </div>
    <p class="copyrights"><small>Copyrights Entourage Coffee Shop All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>

<!-- 背景動画 -->
<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/css/jquery.mb.YTPlayer.min.css">
        <div id="ytPlayer" data-property="{
            videoURL: 'https://www.youtube.com/watch?v=JouMAHQXx-g',
            autoPlay: true,
            loop: 1,
            mute: true,
            showControls: false,
            showYTLogo: false,
            }">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.min.js"></script>
        <script>
            $(function () {
            $("#ytPlayer").YTPlayer();
            });
        </script>

</body>
</html>
