<?php
require_once('util.php');
session_start();

if (!signed_in()) {
  redirect_to('login.php');
}

$token = session_id();
$_SESSION['token'] = $token;

?>
<html>
<head>
    <meta charset="utf-8" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
<div class="container">
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
  <ul class="nav navbar-nav">
    <li>
      <a class="navbar-brand">Webプログラミング演習1<br />前期期末試験</a>
    </li>
    <li>
      <a href="login.php">ログイン</a>
    </li>
    <li>
      <a href="index.php">メニュー</a>
    </li>
    <li>
      <a href="record.php">登録画面</a>
    </li>
    <li>
      <a href="list.php">一覧画面</a>
    </li>
<?php if ($_SESSION['username'] == 'admin') { ?>
    <li>
      <a href="import.php">インポート画面</a>
    </li>
<?php } ?>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="logout.php">ログアウト</a></li>
    <li><a>A13DC138</a></li>
  </ul>
</nav>
</div>
</header>

<div class="container">
  <h1>登録画面</h1>
  <form action="record2file.php" method="POST">
    <fieldset>
      <legend>出納記録</legend>
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <div class="form-group">
        <label for="date">日付</label>
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="content">内容</label>
        <input type="text" class="form-control" id="content" name="content" placeholder="お弁当">
      </div>
      <div class="form-group">
        <label for="payment">出金</label>
        <div class="input-group">
          <input type="number" class="form-control" id="payment" name="payment">
          <div class="input-group-addon">円</div>
        </div>
      </div>
      <div class="form-group">
        <label for="receive">入金</label>
        <div class="input-group">
          <input type="number" class="form-control" id="receive" name="receive">
          <div class="input-group-addon">円</div>
        </div>
      </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">記録する</button>
  </form>
</div>



</body>
</html>