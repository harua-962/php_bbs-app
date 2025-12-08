<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>受信結果</title>

  <style>
    body {
      text-align: center;
      font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif;;
      padding-top: 50px;
    }
  </style>
</head>
<body>
  <h1>データを受け取りました！</h1>
  <?php
      $received_name=$_POST['user_name'];
      $received_lang=$_POST['fav_language'];

      $dsn='mysql:dbname=php_lesson;host=localhost;charset=utf8';
      $user='root';
      $password='';

      try {
        //データベース接続
        $dbh=new PDO($dsn, $user, $password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="INSERT INTO survey (name, language, created_at) VALUES (?,?,NOW())";

        $stmt=$dbh->prepare($sql);

        $stmt->execute([$received_name, $received_lang]);

        echo "<p style='color: blue;'>データベースへの保存に成功しました！</p>";

        //データを全取得する
        $sql_select="SELECT*FROM survey ORDER BY created_at DESC";
        $stmt_select=$dbh->query($sql_select);
        $all_data=$stmt_select->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        echo "<p style='color: red;'>エラー:".$e->getMessage()."</p>";
        exit();
      }

      //受け取ったデータを表示
      $safe_name=htmlspecialchars($received_name, ENT_QUOTES, 'UTF-8');
      echo "<p>あなたの名前:{$received_name}</p>";
      echo "<p>好きな言語:{$received_lang}</p>";

      if ($received_lang=="PHP") {
        echo "<p>PHPを選んでくれてありがとう！一緒に頑張りましょう。</p>";
      } elseif ($received_lang=="Python") {
        echo "<p>Pythonも素晴らしい言語ですよね！</p>";
      } else {
        echo "<p>HTMLも素晴らしい言語ですよね！</p>";
      }
  ?>
  <br>
  <a href="index.php">戻る</a>

  <div class="board-area">
    <h2>みんなのアンケート結果</h2>
    <?php

      foreach ($all_data as $row) {
            $safe_row_name=htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8');
            $safe_row_lang=htmlspecialchars($row['language'],ENT_QUOTES,'UTF-8');
            $row_time=$row['created_at'];

            echo "<div class='message-box'>";
            echo "<strong>{$safe_row_name}</strong>さんの好きな言語は<strong>{$safe_row_lang}</strong>です。";
            echo "<br><span class='time'>({$row_time})</span>";
            echo "</div>";
          }
    ?>
    
  </div>
  
</body>
</html>