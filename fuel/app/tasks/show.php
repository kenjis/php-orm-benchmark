<?php

namespace Fuel\Tasks;

class Show
{
    public function result_table()
    {
        $output = APPPATH . '/cache/benchmark-results.json';
        $results = json_decode(file_get_contents($output), true);

        echo '|orm                |time (ms)|memory   |' . "\n";
        echo '|-------------------|--------:|--------:|' . "\n";

        foreach ($results as $orm => $result) {
            printf("|%-19s|%9.2f|%9.2f|\n", $orm, round($result['time'], 2), round($result['memory'], 2));
        }
    }
}
