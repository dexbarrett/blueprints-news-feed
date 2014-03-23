<?php
class Feed extends Eloquent
{
    protected $fillable = array('feed', 'title', 'active', 'category');

    public static $form_rules = array(
        'category' => 'required|in:News,Sports,Technology',
        'title'    => 'required',
        'feed'     => 'required|url',
        'active'   => 'required|between:0,1'
    );
}