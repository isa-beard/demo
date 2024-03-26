<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>テスト</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contents.css">
  <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container-lg shopping">
        <h2>観葉樹ショップ</h2>
        <form id="check" class="h-adr" action="confirmation.php" method="get">
            <div class="container-lg merchandise">
                <div class="container-md merchandise__child">
                    <img src="images/aodamo_5a16.jpg" alt="">
                    <h3>アオダモ</h3>
                    <input type="number" class="fcart" name="aodamo" placeholder="">
                    <div class="error__cart"></div>
                </div>
                <div class="container-md merchandise__child">
                    <img src="images/irohamomiji_11a17.jpg" alt="">
                    <h3>モミジ</h3>
                    <input type="number" class="fcart" name="momizi" placeholder="">
                    <div class="error__cart"></div>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>氏名</th>
                    <td>
                        <input type="text" class="fname" name="name" placeholder="ジソウ 太郎">
                        <div class="error__name"></div>
                    
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>
                        <input type="text" class="faddress" name="address">
                        <div class="error__address"></div>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" id="button" value="送信"></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="js/validation_isa.js"></script>
</body>
</html>