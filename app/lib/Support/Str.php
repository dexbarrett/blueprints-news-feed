<?php namespace app\lib\Support;

class Str extends \Illuminate\Support\Str {

    public static function parse_feed($url)
    {
        $feed = simplexml_load_file($url);

        if (!count($feed)) {
            return array();
        }

        $out = array();

        $items = $feed->channel->item;

        foreach (range(0, 4) as $i) {
            $out[] = $items[$i];
        }

        return $out;
    }        
}