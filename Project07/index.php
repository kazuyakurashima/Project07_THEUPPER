<!-- data.phpの読み込み→menuの読み込み(menu:クラスを定義→data:クラスのインスタンスを定義) -->
 <!-- onceは一度読み込んだファイルは再読込しないということ -->
<?php require_once('data.php');?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>THE SUPPER</title>
  <link rel="stylesheet" href="css/stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="menu-wrapper container">
    <h1 class="logo">THE SUPPER</h1>

    <form action="confirm.php" method="post">

        <div class="menu-items">
        <!-- 配列$menusの要素を変数$menuとするforeach(endforeachを活用）で記入 -->
        <?php foreach($menus as $menu):?>
            <div class="menu-item">
                <img src="<?php echo $menu->getImage()?>" alt="image">
                <h3 class="menu-item-name"><?php echo $menu->getName()?></h3>
                <p class="price">¥<?php echo $menu->getTaxIncludedPrice()?>(税込)</p>
                <!-- <input>タグで入力ボックスを作成（繰り返す） -->
                <!-- ここで入力された値（orderCount)は、nameで識別していますよ！！！ -->
                <input type="text" value="0" name="<?php echo $menu->getName()?>">
                <span>個</span>
            </div>
        <?php endforeach ?>
        </div>
        <!-- <input>タグで送信ボタンを作成 -->
        <input type="submit" value="注文する">
    </form>
  </div>
</body>
</html>