<?php
$results = json_decode(file_get_contents(dirname(__FILE__) . '/../fuel/app/cache/benchmark-results.json'));
?>

|orm                |time (ms)|memory (KB) |
|-------------------|--------:|-----------:|
<?php foreach ($results as $orm=>$result): ?>
|<?php echo str_pad($orm, 19, " ", STR_PAD_RIGHT) ?>|<?php echo str_pad(sprintf("%.2f", $result->time), 9, " ", STR_PAD_LEFT) ?>|<?php echo str_pad(sprintf("%.2f", $result->memory), 12, " ", STR_PAD_LEFT) ?>|
<?php endforeach; ?>
