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
<?php
    \Config::load('orms', true);
    $orms = \Config::get('orms.list');
?>
<?php foreach ($orms as $orm): ?>
<li><?php echo Html::anchor('orm/' . $orm . '/get_one', ucfirst($orm)); ?>
<?php endforeach; ?>
</ul>
</div>

<hr>

<footer>
    <p style="text-align: right">This page is a part of <a href="https://github.com/kenjis/php-orm-benchmark">php-orm-benchmark</a>.</p>
</footer>
</body>
</html>
