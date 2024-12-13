<!-- ここでdata.phpを読み込んでください  -->
<?php require_once('data.php')?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>THE SUPPER</title>
  <link rel="stylesheet" href="css/stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <!-- <div class="order-wrapper"> -->
    <h2>この度はご注文いただき、誠にありがとうございます。お選びいただいたお料理が間違いないか確認させていただきます。どうぞご安心くださいませ。</h2>

    <!-- totalPaymentの初期設定 -->
    <?php $totalPayment =0 ?>

    <?php foreach ($menus as $menu): ?>
        <!-- 変数$orderCountに,$_POSTで受け取った値を代入するよ！ -->
        <!-- 例えば、beefなら、$orderCountには、$_POST[beef]が入っている。beefの個数が入る -->
        <?php 
            $orderCount = $_POST[$menu->getName()];
            $menu->setOrderCount($orderCount);
            $totalPayment += $menu->getTotalPrice();
        ?>
        
        <p class="order-amount">
            <!-- nameのプロパティを表示 -->
            <?php echo $menu->getName() ?>
             ×
            <?php echo $orderCount ?>
            個
        </p>
        <!-- $menuに対してgetTotalPriceメソッドを呼び出して、金額を表示 -->
        <p class="order-price"><?php echo $menu->getTotalPrice() ?>円</P>

        <!-- データの書き込み・保存 -->
        <?php
            $file = fopen("orders.txt","a");
            // sprintf・・・string（文字列）、print(データを整形)、formatted（フォーマット）
            // 第1引数：フォーマット文字列（"%s × %d個 - 合計: %d円\n"）
            // 第2引数以降：フォーマットに挿入する値（$menu->getName(), $orderCount, $menu->getTotalPrice()）
            fwrite(
                $file,
                sprintf("%s × %d個　- 合計:　%d円\n",$menu->getName(),$orderCount,$menu->getTotalPrice())
            );
            fclose($file);
        ?>

    <?php endforeach ?>
    <h3>合計金額:<?php echo $totalPayment ?>円</h3>

    <h3>注文履歴：</h3>
    <?php
        if (file_exists("orders.txt")) {
            readfile("orders.txt");
        } else {
            echo "注文履歴がありません";
        }
    ?>
  <!-- </div> -->
</body>
</html>