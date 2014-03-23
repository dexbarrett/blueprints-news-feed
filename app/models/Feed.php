<?php
class Feed extends Eloquent
{
    protected $fillable = array('feed', 'title', 'active', 'category');

    protected $feeds;

    public static $form_rules = array(
        'category' => 'required|in:News,Sports,Technology',
        'title'    => 'required',
        'feed'     => 'required|url',
        'active'   => 'required|between:0,1'
    );

    public function getParsedFeed($limit = 4)
    {
        if (is_null($this->feeds)) {
            $this->feeds = simplexml_load_file($this->feed);
        }

        if (!count($this->feed)) {
            return array();
        }

        $output = array();
        $content = $this->feeds->channel->item;

        foreach (range(0, $limit - 1) as $i) {
            $output[] = $content[$i];
        }

        return $output;
    }
}