<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力画面</title>

  <style>
    body {
      text-align: center;
      font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif;;
      padding-top: 50px;
    }
  </style>
</head>
<body>
  <h1>アンケート</h1>
  <form action="receive.php" method="POST">
    <p>名前を入力してください:</p>
    <input type="text" name="user_name">

    <p>好きなプログラミング言語は？:</p>
    <select name="fav_language">
      <option value="Python">Python</option>
      <option value="PHP">PHP</option>
      <option value="HTML">HTML</option>

    </select>
    <br><br>
    <input type="submit" value="送信する">
  </form>
  
</body>
</html>