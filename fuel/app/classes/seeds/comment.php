<?php

namespace Seeds;

class Comment
{
    public static function seed()
    {
        \DBUtil::truncate_table('comment');

        $time = mktime(0, 0, 0, 1, 1, 2000);
        
        for ($i = 1; $i < 101; $i++) {
            \DB::insert('comment')->columns([
                'post_id',
                'body',
                'created_at',
                'updated_at'
            ])->values([
                '1',
                'This is no.' . $i . ' comment.',
                $time + $i,
                $time + $i,
            ])->execute();
        }
    }
}
