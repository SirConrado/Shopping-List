<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?php
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
?>
  <a class="item" href = "/products">
<div class="icon-bar five-up" style = "background-color: #6189a0" >
    <img src="/img/list.svg" >
    <?php if($iphone || $android || $palmpre || $ipod || $berry == true) echo ''; else echo '<label>Produkty</label>'; ?>
  </a>
  <a class="item" href = "/ShoppingLists">
    <img src="/img/basket.svg" >
    <?php if($iphone || $android || $palmpre || $ipod || $berry == true) echo ''; else echo '<label>Zakupy</label>'; ?>
  </a>
  <a class="item" href = "/categories">
    <img src="/img/category.svg" >
    <?php if($iphone || $android || $palmpre || $ipod || $berry == true) echo ''; else echo '<label>Kategorie</label>'; ?>
  </a>

</div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
