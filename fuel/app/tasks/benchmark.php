<?php

namespace Fuel\Tasks;

class Benchmark
{
    public function run()
    {
        $url = 'http://localhost';
        $output = APPPATH  . '/cache/benchmark-results.json';

        $orms = ['eloquent', 'fuel', 'phalcon'];

        foreach ($orms as $orm) {
            echo 'Benchmarking ' . $orm . ' ...';
            
            $time = 0;
            $memory = 0;
            for ($i = 0; $i < 10; $i++) {
                $result = file_get_contents($url . '/orm/' . $orm .'/get_one');
                $tmp = explode("\n", $result);
//                var_dump($tmp);
                $time += (float) trim($tmp[2], ' sec');
                $memory += (float) trim($tmp[3], ' KB');
            }
            
            $time = ($time / $i) * 1000;
            $memory = $memory / $i;
            echo "\t" . substr($time, 0, 9) . 'ms ' . "\t" . $memory . 'KB' . PHP_EOL;
            $data[$orm] = array(
                'time' => $time,
                'memory' => $memory,
            );
        }

        file_put_contents($output, json_encode($data));
    }
}
