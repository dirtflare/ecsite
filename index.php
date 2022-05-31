<?php
session_start();
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gsacf_l07_02;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<li class="products-item">';
    $view .= '<a href="item.php?id='.$result["id"].'">';
    $view .= '<p class="products-thumb"><img src="./img/'.$result["fname"].'" width="200"></p>';
    $view .= '<h3 class="products-title">'.$result["item"].'</h3>';
    $view .= '<p class="products-price">'.$result["value"].'</p>';
    $view .= '</a>';
    $view .= '</li>';
  }
}
?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
  <a href="../../grduation_work/logout.php">Logout</a>
  <header class="header">
    <h1 class="site-title"><a href="#"><img src="images/common/logo4.png" alt="Entourage Coffee Shop"></a></h1>
    <a href="cart.php" class="btn btn-cart"><img src="images/common/icon-cart.png" alt="Entourage Coffee Shop"></a>
    <a href="#" class="btn btn-menu"><img src="images/common/icon-menu.png" alt=""></a>
  </header>


  <div>
    <!-- ページ上部スライドショー -->
    <ul class="bxslider">
      <li><img src="images/index/slide33.jpg" alt=""></li>
      <li><img src="images/index/slide66.jpg" alt=""></li>
      <li><img src="images/index/slide11.jpg" alt=""></li>
      <li><img src="images/index/slide77.jpg" alt=""></li>
      <li><img src="images/index/slide44.jpg" alt=""></li>
    </ul>
  </div>

  <div class="outer">
    <!--メインカテゴリー-->
    <div class="list-outer">
      <ul class="list">
        <li class="list-item"><a href="#">OIL</a></li>
        <li class="list-item"><a href="#">EDIBLE</a></li>
        <li class="list-item current"><a href="#">VAPE LIQUID</a></li>
        <li class="list-item"><a href="#">COSME</a></li>
        <li class="list-item"><a href="#">GOODS</a></li>
      </ul>
    </div>
    <!--end メインカテゴリー-->

    <div class="wrapper wrapper-main flex-parent">

      <aside class="sidebar">
        <!--form-->
        <div class="widget">
          <form action="" method="get" class="search-form">
            <div>
              <input type="text" placeholder="アイテムを探す" class="search-box">
              <input type="submit" value="送信" class="search-submit">
            </div>
          </form>
        </div>
        <!--end form-->

        <!--category-->
        <div class="widget">
          <h3 class="widget-title">All products</h3>
          <ul class="category-list">
            <li class="category-item"><a href="#">OIL</a></li>
            <li class="category-item"><a href="#">EDIBLE</a></li>
            <li class="category-item"><a href="#">VAPE LIQUID</a></li>
            <li class="category-item"><a href="#">COSME</a></li>
            <li class="category-item"><a href="#">GOODS</a></li>
          </ul>
        </div>
        <!--end category-->
      </aside>

      <main class="wrapper-main">
        <!--並び替えボタン-->
        <div class="sort-area">
          <a href="#" class="sort-all">全てを見る</a>

          <div class="sort-detail">
            <p class="sort-text">並べ替え:</p>
            <ul class="sort-list flex-parent">
              <li class="sort-item"><a href="#">名前順</a></li>
              <li class="sort-item"><a href="#">価格の安い順</a></li>
            </ul>
          </div>
        </div>
        <!--end 並び替えボタン-->

        <!--商品リスト-->
        <ul class="products-list">
            <?php echo $view; ?>
        </ul>
        <!--end 商品リスト-->

        <!--ページャー-->
        <ul class="pager clearfix">
          <li class="pager-item"><a href="#">1</a></li>
          <li class="pager-item"><a href="#">2</a></li>
          <li class="pager-item"><a href="#">3</a></li>
          <li class="pager-item"><a href="#">4</a></li>
          <li class="pager-item"><a href="#">5</a></li>
          <li class="pager-item"><a href="#">最後へ</a></li>
        </ul>
        <!--end ページャー-->
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

      <div class="footer-widget__long">
        <p><a href="#"><img src="images/common/logo4.png" alt="Entourage Coffee Shop"></a></p>
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
          <li class="social-item"><a href="#"><img src="images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/twitter.png" alt=""></a></li>
        </ul>
      </div>

    </div>
    <p class="copyrights"><small>Copyrights Entourage Coffee Shop All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script>
  $(".bxslider").bxSlider({auto:true,options:3000});
</script>


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
