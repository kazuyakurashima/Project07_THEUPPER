<?php

// menu.phpの読み込み
require_once('menu.php');

// データ定義用のファイル
//  Menuクラスのインスタンス（設計図）を作り、変数を定義した。引数も入れた。
$beef = new Menu('BEEF', 3500, 'img/beefsteak.jpg');
$cacao = new Menu('CACAO', 2500, 'img/cacao.jpg');
$caprese = new Menu('CAPRESE', 500, 'img/caprese.jpg');
$cocktail = new Menu('COCKTAIL',1500, 'img/cocktail.jpg');

// beefに対して数値の2を引数としてsetOrderCountメソッドを呼び出す！
$beef->setOrderCount(2);

// 配列に、4つのインスタンスを入れて、変数$menusに代入
$menus = array($beef, $cacao, $caprese, $cocktail);

?>