<?php

namespace Fuel\Tasks;

class Show
{
    public function result_table()
    {
        $output = APPPATH . '/cache/benchmark-results.json';
        $results = json_decode(file_get_contents($output), true);

        echo '|orm                |time               |memory     |' . "\n";
        echo '|-------------------|------------------:|----------:|' . "\n";

        foreach ($results as $orm => $result) {
            printf("|%-19s|%19s|%11s|\n", $orm, $result['time'], $result['memory']);
        }
    }
}
