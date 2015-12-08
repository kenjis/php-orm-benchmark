<?php

class Controller_Index extends Controller
{
    public function action_index()
    {
        require APPPATH . '/vendor/php-recipe-2nd/make_chart_parts.php';

        $output = APPPATH . '/cache/benchmark-results.json';
        $results = json_decode(file_get_contents($output), true);

        $barColors = array('pink', 'purple', 'green', 'red', 'blue', 'gray', 'orange');

        // Time Benchmark
        $data[] = array('', 'time', array('role' => 'style'));  // header

        $colors = $barColors;
        foreach ($results as $fw => $result) {
            $data[] = array($fw, $result['time'], array_shift($colors));
        }
        //var_dump($data); exit;

        $options = array(
          'title'  => 'Time',
          'titleTextStyle' => array('fontSize' => 16),
          'hAxis'  => array('title' => 'time (ms)',
                            'titleTextStyle' => array('bold' => true)),
          'vAxis'  => array('minValue' => 0, 'maxValue' => 0.01),
          'width'  => 500,
          'height' => 400,
          'bar'    => array('groupWidth' => '90%'),
          'legend' => array('position' => 'none')
        );
        $type = 'ColumnChart';
        list($chart_time, $div_time) = makeChartParts($data, $options, $type);

        // Memory Benchmark
        $data = array();
        $data[] = array('', 'memory', array('role' => 'style'));  // header

        $colors = $barColors;
        foreach ($results as $fw => $result) {
            $data[] = array($fw, $result['memory'], array_shift($colors));
        }

        $options = array(
          'title'  => 'Memory',
          'titleTextStyle' => array('fontSize' => 16),
          'hAxis'  => array('title' => 'memory (KB)',
                            'titleTextStyle' => array('bold' => true)),
          'vAxis'  => array('minValue' => 0, 'maxValue' => 1),
          'width'  => 500,
          'height' => 400,
          'bar'    => array('groupWidth' => '90%'),
          'legend' => array('position' => 'none')
        );
        $type = 'ColumnChart';
        list($chart_mem, $div_mem) = makeChartParts($data, $options, $type);
        
        $data = [
            'chart_time' => $chart_time,
            'div_time'    => $div_time,
            'chart_mem'   => $chart_mem,
            'div_mem'     => $div_mem,
        ];
        
        return View::forge('index/index', $data, false);
    }
}
