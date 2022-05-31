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
    <p class="site-title"><a href="../index.php"><img src="../images/common/logo4.png" alt="Entourage Coffee Shop"></a></p>
  </header>
  <!-- end header-->

  <div class="outer">

    <!--商品本情報-->
    <div class="wrapper wrapper-cms">
      <!--商品選択フォーム  insert.phpへ送信  画像を送信するときはenctype〜をコピペ-->
      <form action="insert.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!--商品情報-->
        <p class="cms-thumb"><img src="https://placehold.jp/150x150.png?text=CBD" width="200"></p>
        <dl class="cms-list">
          <dt>画像</dt>
          <dd><input type="file" name="fname" class="cms-item" accept="image/*"></dd>
          <dt>商品名</dt>
          <dd><input type="text" name="item" placeholder="商品名を入力" class="cms-item"></dd>
          <dt>金額</dt>
          <dd><input type="text" name="value" placeholder="金額を入力" class="cms-item"></dd>
          <dt>商品紹介文</dt>
          <dd><textarea name="description" id="" cols="30" rows="10" class="cms-item">商品紹介文を入力</textarea></dd>
        </dl>
        <!--end 商品情報-->
        <ul class="btn-list btn-list__cms">
          <li class="">
            <a href="./" class="btn-back">戻る</a>
          </li>
          <li class="btn-calculate">
            <!--送信ボタン 押すと内容がinsert.phpに飛ぶ-->
            <input type="submit" id="btn-update" value="登録">
          </li>
        </ul>
        </form>
        <!--end 商品選択フォーム-->
    </div>
    <!--end 商品本情報-->
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
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.cms-thumb > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});
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
