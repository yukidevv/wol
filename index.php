<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Wake on LAN</title>
</head>
<body>
  <h1>Wake-on-LAN</h1>
  <form method="POST" action="php/wol.php">
    <label for="mac">MACアドレス:</label>
    <input type="text" id="mac" name="mac" required>
    <button type="submit">送信</button>
  </form>
</body>
</html>
