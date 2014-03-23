@extends('layouts.master')

@section('title','Your awesome news aggregation site')

@section('content')
    <h1>Your awesome news aggregation site</h1>
    @if(count($categories))
        @foreach($categories as $category => $cat_feeds)
            <h2>{{ Str::title($category) }}</h2>
            @foreach($cat_feeds as $cat_feed)
                <h3>{{ $cat_feed->title }}</h3>
                <ul>
                   <?php $feeds = Str::parse_feed($cat_feed->feed); ?>
                   @if(count($feeds))
                       @foreach($feeds as $eachfeed)
                           @include('partials.feed')
                       @endforeach  
                   @endif   
               </ul>
            @endforeach
        @endforeach   
    @endif
@stop