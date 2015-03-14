<?php
require_once('util.php');
session_start();

if (signed_in()) {
  redirect_to('index.php');
}

// ログイン処理
if(isset($_POST['username'], $_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(authenticate($username, $password)){
    redirect_to('index.php');
  } else {
    $alert_meggase = 'ユーザー名またはパスワード、もしくは両方が間違っています。';
  }
}


?>
<html>
<head>
  <meta charset="utf-8" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <style>
    .login-box{
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      background: #eee;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
<?php if(isset($alert_meggase)){ ?>
<script>
  alert('<?php echo $alert_meggase ?>');
</script>
<?php } ?>
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
    <li><a>A13DC138</a></li>
  </ul>
</nav>
</div>
</header>

<div class="login-box">
  <form action="login.php" method="POST">
    <fieldset>
      <legend>ログイン</legend>
      <div class="form-group">
        <label for="username">ユーザー名</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="ユーザー名">
      </div>
      <div class="form-group">
        <label for="userName">パスワード</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="パスワード">
      </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">ログイン</button>
  </form>
</div>



</body>
</html>