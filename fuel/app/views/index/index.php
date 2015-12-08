<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP ORM Benchmark</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
echo $chart_time, $chart_mem;
?>
</script>
</head>
<body>
<h1>PHP ORM Benchmark</h1>
<div>
<?php
echo $div_time, $div_mem;
?>
</div>

<hr>

<div>
<ul>
<li><?php echo Html::anchor('orm/doctrine/get_one', 'Doctrine ORM'); ?>
<li><?php echo Html::anchor('orm/propel2/get_one', 'Propel2 ORM'); ?>
<li><?php echo Html::anchor('orm/eloquent/get_one', 'Eloquent ORM'); ?>
<li><?php echo Html::anchor('orm/fuel/get_one', 'FuelPHP 1.x Orm'); ?>
<li><?php echo Html::anchor('orm/phalcon/get_one', 'Phalcon ORM'); ?>
</ul>
</div>

<hr>

<footer>
    <p style="text-align: right">This page is a part of <a href="https://github.com/kenjis/php-orm-benchmark">php-orm-benchmark</a>.</p>
</footer>
</body>
</html>
